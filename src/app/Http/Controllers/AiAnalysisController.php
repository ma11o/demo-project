<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AiAnalysisLog;

class AiAnalysisController extends Controller
{
    public function submit(Request $request)
    {
        try {

            if (!$request->image_path) {
                throw new \Exception("画像のパスを指定してください。");
            }

            $image_path = $request->image_path;
            $request_timestamp = now()->timestamp;
            $response = Http::post(env('API_URL') . "analysis", [
                'image_path' => $image_path
            ]);
            $response_timestamp = now()->timestamp;
            $result = $response->json();

            if (!isset($result['success']) || !$result['success']) {
                $AiAnalysisLog = new AiAnalysisLog();
                $AiAnalysisLog->image_path = $image_path;
                $AiAnalysisLog->success = "false";
                $AiAnalysisLog->message = $result['message'];
                $AiAnalysisLog->request_timestamp = $request_timestamp;
                $AiAnalysisLog->response_timestamp = $response_timestamp;
                $AiAnalysisLog->save();

                throw new \Exception("解析に失敗しました。");
            }

            $AiAnalysisLog = new AiAnalysisLog();
            $AiAnalysisLog->image_path = $image_path;
            $AiAnalysisLog->success = "true";
            $AiAnalysisLog->message = $result['message'];
            $AiAnalysisLog->class = $result['estimated_data']['class'];
            $AiAnalysisLog->confidence = $result['estimated_data']['confidence'];
            $AiAnalysisLog->request_timestamp = $request_timestamp;
            $AiAnalysisLog->response_timestamp = $response_timestamp;
            $AiAnalysisLog->save();
            
            return redirect()->back()->with('success', '解析が完了しました。');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function analysis_logs() 
    {
        $AiAnalysisLog = new AiAnalysisLog();
        $analysis_logs = $AiAnalysisLog->all();
        
        return view('analysis_logs', compact('analysis_logs'));
    }
}
