<?php
/**
 * Created by MRS.
 * User: sonmobi@gmail.com
 * Date: 3/29/2018
 * Time: 16:36
 */

namespace App\Logging;

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class CreateCustomLogger
{
    public function __invoke(array $config)
    {
        //Chú ý thứ tự mức độ log, lần lượt từ trái qua phải, cái nào viết trước thì phải viết trước
        //debug, info, notice, warning, error, critical, alert, emergency.
        $arrLevel = [
            'logs/debug.log'=>Logger::DEBUG,
            'logs/info.log'=>Logger::INFO,
            'logs/notice.log'=>Logger::NOTICE,
            'logs/warning.log'=>Logger::WARNING,
            'logs/error.log'=>Logger::ERROR,
            'logs/critical.log'=>Logger::CRITICAL,
            'logs/alert.log'=>Logger::ALERT,
            'logs/emergency.log'=>Logger::EMERGENCY
            ];
        $uri = @$_SERVER['REQUEST_URI'];
        $logger = new Logger('S');

        foreach ($arrLevel as $file => $level){
            $stream = new StreamHandler(storage_path($file), $level, false);
            $stream->setFormatter(new LineFormatter(
                "[%datetime%] %channel%.%level_name%: %message% %context% %extra% #$uri\n",
                null,
                false,
                true
            ));
            $logger->pushHandler($stream);
        }
        return $logger;
    }
// Cách sử dụng log như sau:
//        $message = 'Test chuc nang log: ';
//        Log::emergency($message);
//        Log::alert($message);
//        Log::critical($message);
//        Log::error($message);
//        Log::warning($message);
//        Log::notice($message);
//        Log::info($message);
//        Log::debug($message);

// bạn có thể gọi hàm ghi log ở bất cứ đâu nếu bạn cần
}