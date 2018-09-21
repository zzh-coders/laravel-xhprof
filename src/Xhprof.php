<?php


namespace Zehua\LaravelXhprof;


use Illuminate\Http\Request;

class Xhprof
{
    public function start()
    {
        xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
    }

    public function end(Request $request)
    {
        $xhprof_data = xhprof_disable();
        require_once __DIR__ . '/XhprofLib/utils/xhprof_lib.php';
        require_once __DIR__ . '/XhprofLib/utils/xhprof_runs.php';

        $xhprof_runs = new \XHProfRuns_Default();

        $run_id = $xhprof_runs->save_run($xhprof_data, $request->path());

        //todo::将这个数据存储到数据库上面
    }
}