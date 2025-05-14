@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-4">Create Order</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Please fix the following errors:<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                    @csrf

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Nutrition Facts</th>
                                    <th>Price (Rp)</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($foods as $food)
                                    <tr data-id="{{ $food->id }}" data-name="{{ $food->name }}" data-price="{{ $food->price }}">
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->description }}</td>
                                        <td>{{ $food->nutrition_facts }}</td>
                                        <td>{{ number_format($food->price, 0, ',', '.') }}</td>
                                        <td>
                                            <input type="number" class="form-control quantity-input" min="1" value="1">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success add-to-basket">Add</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <h5 class="fw-bold mt-4">Items in Basket</h5>
                    <div id="basketItems" class="mb-3"></div>

                    <div class="mb-3">
                        <h5>Total Harga: <span id="totalHarga">Rp 0</span></h5>
                    </div>

                    <input type="hidden" name="basket" id="basketData">

                    <div class="d-flex gap-2">
                        <a href="{{ url('/daftar-order') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        #basketItems .item {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
    </style>

    <script>
        const basket = [];
        const basketItemsContainer = document.getElementById('basketItems');
        const totalHargaSpan = document.getElementById('totalHarga');
        const basketDataInput = document.getElementById('basketData');

        function updateBasketDisplay() {
            basketItemsContainer.innerHTML = '';
            let total = 0;

            basket.forEach((item, index) => {
                total += item.harga_jual * item.quantity;

                const div = document.createElement('div');
                div.classList.add('item');
                div.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>${item.name}</strong><br>
                            Quantity: ${item.quantity}<br>
                            Harga Jual: Rp ${item.harga_jual.toLocaleString()}
                        </div>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeItem(${index})">Remove</button>
                    </div>
                `;
                basketItemsContainer.appendChild(div);
            });

            totalHargaSpan.textContent = 'Rp ' + total.toLocaleString();
            basketDataInput.value = JSON.stringify(basket);
        }

        function removeItem(index) {
            basket.splice(index, 1);
            updateBasketDisplay();
        }

        document.querySelectorAll('.add-to-basket').forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const foodId = row.dataset.id;
                const name = row.dataset.name;
                const price = parseFloat(row.dataset.price);
                const qtyInput = row.querySelector('.quantity-input');
                const quantity = parseInt(qtyInput.value);

                if (quantity > 0) {
                    basket.push({
                        food_id: foodId,
                        name: name,
                        quantity: quantity,
                        harga_jual: price
                    });
                    updateBasketDisplay();
                }
            });
        });

        document.getElementById('orderForm').addEventListener('submit', function (e) {
            if (basket.length === 0) {
                e.preventDefault();
                alert('Please add at least one item to the basket before submitting.');
            }
        });
    </script>
@endsection

@section('judul-halaman', 'Create Order')
@section('judul-browser', 'Create Order')
