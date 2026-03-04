<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="user-menu">
                <ul>
                    <li><a href="?inc=home"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> Minha conta</a></li>
                    <li><a href="#"><i class="fa fa-heart"></i> Favoritos</a></li>
                    <li><a href="?inc=cart"><i class="fa fa-user"></i> Carrinho</a></li>
                    <li><a href="?inc=login"><i class="fa fa-user"></i> Entrar</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="header-right">
                <ul class="list-unstyled list-inline">
                    <li>
                        <a>Bem Vindo,
                            <?php if (isAuth()) : ?>
                                <?php echo fullName(); ?>
                            <?php else : ?>
                                Visitante
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php if (isAuth()) : ?>
                        <li><a href="?inc=logout">Sair</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>