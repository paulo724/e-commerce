<div class="site-branding-area">
    <?php require BASE . '/app/views/partials/branding.php' ?>
</div> <!-- End site branding area -->
<div class="mainmenu-area">
    <?php require BASE . '/app/views/partials/main-menu.php' ?>
</div> <!-- End mainmenu area -->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Produto</th>
                                        <th class="product-price">Preço</th>
                                        <th class="product-quantity">Quantidade</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($products)) : ?>
                                        <tr>
                                            <td colspan="6">Nenhum produto no carrinho</td>
                                        </tr>
                                    <?php endif ?>
                                    <?php foreach ($products as $product) : ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" data-id="<?php echo $product['id']; ?>" class="remove" href="#">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="assets/img/<?php echo $product['img']; ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $product['name']; ?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-" data-id="<?php echo $product['id']; ?>">
                                                    <input type="text" size="4" id="qty<?php echo $product['id']; ?>" class="input-text qty text" title="Qty" value="<?php echo $product["qty"] ?>" min="0" step="1">
                                                    <input type="button" class="plus" value="+" data-id="<?php echo $product['id']; ?>">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">R$ <?php echo number_format($product['subtotal'], 2, ',', '.'); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Cupom:</label>
                                                <input type="text" placeholder="Codigo do cupom" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                <input type="submit" value="Aplicar cupom" name="apply_coupon" class="button">
                                            </div>
                                            <button type="submit" formmethod="POST" href="?inc=clear-cart" class="button">Limpar Carrinho</button>
                                            <input type="submit" value="Ir para o pagamento" name="proceed" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">
                            <div class="col-md-12">
                                <div class="cart_totals ">
                                    <h2>Informações do carrinho</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount">R$ <?php echo number_format($total, 2, ',', '.'); ?></span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Valor do frete</th>
                                                <td>Frete Gratis</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Valor total</th>
                                                <td><strong><span class="amount">R$ <?php echo number_format($total, 2, ',', '.'); ?></span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <form method="post" action="#" class="shipping_calculator">
                                    <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2>

                                    <section>

                                        <p class="">
                                            <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                <option value="">Select a country…</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                            </select>
                                        </p>

                                        <p class=""><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="State / county" value="" class="input-text"> </p>

                                        <p><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / Zip" value="" class="input-text"></p>


                                        <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                    </section>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>