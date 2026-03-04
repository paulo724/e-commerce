<?php
return match ($inc) {

    'send-contact' => function () {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $subject = strip_tags($_POST['subject']);
        $message = strip_tags($_POST['message']);

        $send = send($email, 'paulo.henrique724.ph@gmail.com', $name, $subject, $message);

        if ($send) {

            setFlash('mail', 'Email enviado com sucesso');
            return redirect('?inc=contact');
        }
        setFlash('mail', 'Ocorreu um erro ao enviar o email.');
        return redirect('?inc=contact');
    },
    'add-to-cart' => function () {

        $product = json_decode(file_get_contents("php://input"));

        $qtyTotal = isset($product->qtyTotal);


        addToCart($product->id, $product->quantity, $qtyTotal);


        echo json_encode(getCart());
    },
    'get-products' => function () {

        echo json_encode(getCart());
    },
    'login' => function () {

        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);


        where('email', '=', $email);
        $user = first('users');

        if (!$user) {
            setFlash('login', 'Usuario ou senha invalida');
            return redirect('?inc=login');
        }
        if (password_verify($password, $user->password)) {
            setFlash('login', 'Usuario ou senha invalida');
            return redirect('?inc=login');
        }

        unset($user->password);
        $_SESSION['user'] = $user;
        return redirect('/public/');
    },
    default => function () {
        var_dump('whoops, not foundrr');
    }
};
