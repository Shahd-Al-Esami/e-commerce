
<div class="container">
    <h1>Your Orders</h1>

    @if($orders->isEmpty())
        <div class="alert alert-info">
            You have no orders yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format(' M, Y') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm"></a>
                                <!-- You can add more actions like 'Cancel', 'Reorder' based on the application -->
                            </td>
                        </tr  >                  @endforeach
                </tbody>
 </table>
        </div>
   @endif
</div>

