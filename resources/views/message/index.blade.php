<html>
    <head>
        <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}">
    </head>
    <body>
        <h1>留言板</h1>
        <div class="login-01">
            <form action="/message/post" method="post">
                @csrf
                <ul>
                    <li class="first">
                        <a href="#" class=" icon user"></a>
                        <input type="text" class="text" name="name" value="姓名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '姓名';}" >
                        <div class="clear"></div>
                    </li>
                    <li class="second">
                        <a href="#" class=" icon msg"></a>
                        <textarea value="内容" name="content" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '内容';}">内容</textarea>
                        <div class="clear"></div>
                    </li>
                </ul>
                <input type="submit" onClick="myFunction()" value="Submit" >
                <div class="clear"></div>
            </form>
        </div>
    </body>
    @if(Session::has('message'))
        <script>
            alert('提交成功')
        </script>
    @endif
</html>
