@extends('admin.layouts.main')
@section('content')

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Request</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Check Deposit Status</h1>
    <div id="response"></div>

    <script>
        // Hàm gửi yêu cầu AJAX
        function sendRequest() {
            $.ajax({
                url: '/api/check-deposit', // Đường dẫn đến route trong Laravel
                method: 'GET', // Hoặc 'POST' nếu bạn cần gửi dữ liệu
                success: function(data) {
                    // Xử lý kết quả trả về
                    if (data) {
                        $('#response').html('<pre>' + JSON.stringify(data, null, 2) + '</pre>');
                    } else {
                        $('#response').html('<p>No data found.</p>');
                    }
                },
                error: function(err) {
                    $('#response').html('<p>Error: ' + err.statusText + '</p>');
                }
            });
        }

        // Gửi yêu cầu AJAX mỗi giây (1000ms)
        setInterval(sendRequest, 100000); // 1000ms = 1s
    </script>
</body>
</html> --}}
<!-- resources/views/check_deposit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Deposit</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Check for Deposit</h1>
    <div id="transaction-list"></div>

    <script>
        function fetchDepositTransactions() {
            $.ajax({
                url: '/api/check-deposit',
                method: 'GET',
                success: function (data) {
                    // Clear previous transactions
                    $('#transaction-list').empty();

                    // If there are transactions, display them
                    if (data.length > 0) {
                        data.forEach(function (transaction) {
                            $('#transaction-list').append(`
                                <div>
                                    <p><strong>Amount:</strong> ${transaction.amount}</p>
                                    <p><strong>Description:</strong> ${transaction.description}</p>
                                    <p><strong>Receiver:</strong> ${transaction.receiverName}</p>
                                    <hr>
                                </div>
                            `);
                        });
                    } else {
                        $('#transaction-list').append('<p>No new deposits found.</p>');
                    }
                },
                error: function (err) {
                    console.log('Error:', err);
                }
            });
        }

        // Poll every 30 seconds (30000 ms)
        setInterval(fetchDepositTransactions, 30000);
    </script>
</body>
</html>


@endsection
