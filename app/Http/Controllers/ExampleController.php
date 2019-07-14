<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function hello()
    {
        // khi gọi hàm view(), có một số lưu ý: 
        // - Mặc định thư mục gốc là `resources/views`
        // - Từ thư mục gốc, việc phân cách thư mục sẽ sử dụng dấu .
        // - Tên view không cần khai báo đuôi file (extension) `blade.php`
        
        // => view được gọi hiển thị sẽ nằm trong thư mục `resources/views/example/hello.blade.php'
        return view('example.hello');
    }
}
