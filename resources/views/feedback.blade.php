

<!-- resources/views/feedback.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    <h1>Thank you for your request!</h1>
    <p>Your Request ID: {{ $requestDetails->id }}</p> <!-- Display the Request ID here -->
    
    <a href="{{ route('requests.download_pdf', ['id' => $requestDetails->id]) }}">Download your request details as PDF</a> <!-- Link to download the PDF -->
</body>
</html>
