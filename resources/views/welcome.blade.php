<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    #employee{
        color: #ffffff;
    }
    ul li {
        list-style: none;
        position: relative;
        padding: 3px 0 2px 25px;
    }

    ul li::before {
        content: '*';
        position: absolute;
        top: 6px;
        left: 0;
    }
</style>
</head>
<body class="bg-dark">
<div class="justify-center    py-4">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="container">
        <form class="form-inline">
            <div class="row">
                <div class="col-md-2"><label for="" style="color:#fff"> Countries </label></div>
                <div class="col-md-4">
                    <div class="form-group">

                        <select class="form-control" id="company">
                            <option disabled selected>Please Select</option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" onclick="getDepartment()" class="btn btn-primary"> Search</button>
                </div>
            </div>
        </form>

        <br/>
        <form class="form-inline" id="department_div" style="visibility: hidden">
            <div class="row">
                <div class="col-md-2"><label for="" style="color:#fff"> Department </label></div>
                <div class="col-md-4">
                    <div class="form-group">

                        <select class="form-control" id="department">
                            <option disabled selected>Please Select</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" onclick="getEmployee()" class="btn btn-primary"> Search</button>
                </div>
            </div>
        </form>
        <br/>
        <div id="employee_div" style="visibility: hidden">
            <div class="row">
                <div class="col-md-2"><label for="" style="color:#fff"> Employee </label></div>
                <div class="col-md-4">
                    <ul id="employee" class="list">
                        <li>All Employee</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
<script>
    function getDepartment() {
        let val = $('#company').find(":selected").val();
        if (val === 0) {
            alert('Please Select Company')
        }

        $.ajax({
            type: "GET",
            url: $(location).attr('href') + `department/${val}`,
            dataType: 'json', // force the ajax request to return json data
            success: function (data) {
                $('#department').find('option')
                    .remove()
                    .end()
                    .append(`<option disabled selected>Please Select</option>`);
                $.each(data, function () {
                    $.each(this, function (k, v) {
                        $('#department').append(`<option value="${v.id}">${v.name}</option>`);
                    });
                });
                $('#department_div').css('visibility', 'visible');
            }
        });
    }

    function getEmployee() {
        let val = $('#department').find(":selected").val();
        if (val === 0) {
            alert('Please Select Company')
        }
        $.ajax({
            type: "GET",
            url: $(location).attr('href') + `employee/${val}`,
            dataType: 'json', // force the ajax request to return json data
            success: function (data) {
                $('#employee')
                    .empty()
                    .append(`<li>All Employee</li>`);
                $.each(data, function () {
                    $.each(this, function (k, v) {
                        console.log(k)
                        console.log(v)
                        $('#employee').append(`<li class="list-item">${v.name}</li>`);
                    });
                });
                $('#employee_div').css('visibility', 'visible');
            }
        });
    }
</script>
</body>
</html>
