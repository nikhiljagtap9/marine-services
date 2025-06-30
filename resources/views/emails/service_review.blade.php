<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Service Review</title>
</head>
<body>
    <h2>You received a new review!</h2>

    <p><strong>Company/Vessel Name:</strong> {{ $review->vessel_company_name }}</p>
    <p><strong>Email:</strong> {{ $review->vessel_company_email }}</p>

    <p><strong>Port:</strong> {{ optional($review->port)->name ?? 'N/A' }}</p>
    <p><strong>Service Date:</strong> {{ $review->service_date }}</p>

    <p><strong>Category:</strong> {{ optional($review->category)->name ?? 'N/A' }}</p>

    <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
    <p><strong>Comment:</strong> {{ $review->comment }}</p>

    @if($review->invoice_document)
        <p><strong>Invoice Document:</strong>
            <a href="{{ asset('storage/' . $review->invoice_document) }}" target="_blank">View File</a>
        </p>
    @endif

    <p>Thanks,<br>Rated Marine Services</p>

</body>
</html>
