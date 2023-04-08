<?php

return match ($inc) {

    'home' => function () {
        $data = get('products');
        return ['products' => $data, 'title' => 'Home'];
    },
    'contact' => function () {
        return ['title' => 'Contato'];
    },
    'details' => function () {
        $id = strip_tags($_GET['id']);

        where('id', '=', $id);
        $product = first('products');

        return ['product' => $product];
    },
    'cart' => function () {
        $products = getCart();
        $total = totalInCart();
        return ['title' => 'Carrinho', 'products' => $products, 'total' => $total];
    },
    'cart-remove' => function () {
        $id = strip_tags($_GET['id']);

        removeFromCart($id);
    },
    'clear-cart' => function () {
        clearCart();
        return redirect('?inc=cart');
        die();
    },
    'login' => function () {
        return ['title' => 'Login'];
    },
    'logout' => function () {
        logout();
        die();
    },
    default => function () {
        var_dump('whoops, route not found');
    }
};
