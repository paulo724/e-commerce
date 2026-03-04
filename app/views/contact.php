<h2>Contato<h2>
        <?php echo getFlash('mail'); ?>
        <form action="?inc=send-contact" method="POST">
            <input type="text" name="name" value="Paulo">
            <input type="text" name="email" value="paulo.henrique724.ph@gmail.com">
            <input type="text" name="subject" value="Compra a preço de custo">
            <textarea name="message" id="" cols="30" rows="10">Compra de produtos com desconto</textarea>
            <button type="submit">Enviar</button>

        </form>