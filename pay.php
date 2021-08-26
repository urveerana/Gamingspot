<div class="container" style="background: white;border: 1px black solid">


    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-4-5">
                <span class="text-muted"><strong>Your cart</strong></span>
                <span class="badge badge-primary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Total Amount</h6>
                        <small></small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-md my-0 ml-0">Redeem</button>
                        </div>
                    </div>
                </form>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total After Promo/Discount</span>
                    <strong>$20</strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate>

                <h4 class="mb-3"><strong>Payment</strong></h4>

                <div class="d-block my-3">
                    <div class="form-check pl-0">
                        <input style="border: 1px black solid" id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check pl-0">
                        <input style="border: 1px black solid" id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debit card</label>
                    </div>

                </div>
                <div class="row" style="margin: 0px -70px;">
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-name" class="form-control" required>
                            <label for="cc-name">Name on card</label>
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-number" class="form-control" required>
                            <label for="cc-number">Credit card number</label>
                        </div>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3 mb-2" style="margin: -100px -380px;">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-expiration" class="form-control" required>
                            <label for="cc-expiration">Expiration</label>
                        </div>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-2" style="margin: -100px -90px; ">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-cvv" class="form-control" required>
                            <label for="cc-cvv">CVV</label>
                        </div>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
