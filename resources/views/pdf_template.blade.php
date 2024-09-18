<!DOCTYPE html>
<html>
<head>
    <title>Request Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 30px;
            margin-bottom: 40px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2c3e50;
        }
        .request-details {
            max-width: 700px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            padding: 40px;
            border: 1px solid #e0e0e0;
        }
        .request-details p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .request-details strong {
            color: #2c3e50;
        }
        .detail-header {
            font-size: 18px;
            margin-bottom: 20px;
            color: #4CAF50;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 5px;
        }
        .info-box {
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin-bottom: 20px;
            background-color: #fafafa;
        }
        .info-box p {
            display: flex;
            justify-content: space-between;
        }
        .info-box strong {
            font-weight: bold;
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
        }
        footer p {
            margin: 5px 0;
        }
        footer a {
            color: #00B98E;
        }
    </style>
</head>
<body>
    <div class="request-details">
        <h1>Request Details</h1>

        <div class="info-box">
            <p><strong>Request ID:</strong> <span>{{ $requestDetails->id }}</span></p>
            <p><strong>Name:</strong> <span>{{ $requestDetails->name }}</span></p>
            <p><strong>Position:</strong> <span>{{ $requestDetails->position }}</span></p>
            <p><strong>Hall:</strong> <span>{{ $requestDetails->hall }}</span></p>
        </div>

        <div class="info-box">
            <p><strong>Purpose:</strong> <span>{{ $requestDetails->purpose }}</span></p>
            <p><strong>Contact Number:</strong> <span>{{ $requestDetails->contact_num }}</span></p>
            <p><strong>Event Date:</strong> <span>{{ $requestDetails->event_date }}</span></p>
        </div>

        <div class="info-box">
            <p><strong>Start Time:</strong> <span>{{ $requestDetails->start_time }}</span></p>
            <p><strong>End Time:</strong> <span>{{ $requestDetails->end_time }}</span></p>
            <p><strong>Request Status:</strong> <span>{{ $requestDetails->status }}</span></p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 University of Ruhuna. All rights reserved.</p>
        <p><a href="http://127.0.0.1:8000/index">Visit Our Website</a></p>
    </footer>
</body>
</html>
