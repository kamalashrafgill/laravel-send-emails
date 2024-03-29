<h1>Hello {{ $name }},</h1>
<p>Thank you for ordering from our website.</p>
<p>Here is the list of items purchased:</p>
<table style="border: 1px solid black;">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total = 0;
    @endphp
    @foreach($products as $product)
        @php
            $total += $product['price'] * $product['quantity'];
        @endphp
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>{{ $product['price'] * $product['quantity'] }}</td>
        </tr>
    @endforeach
    <td colspan="2"></td>
    <td>Amount</td>
    <td>{{ $total }}</td>
    </tbody>
</table>
