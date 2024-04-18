<div class="error-page">
    <h2>Oops!</h2>
    <h1 class="error-code"> 405 </h1>
    <h2>Not Found</h2>
    <div class="error-details">
        Nos desculpe, um erro ocorreu. Essa requisição não é permitida pelo tipo de seu usuário!
    </div>

    <!--    <form class="form-inline">
            <div class="form-group">
                <label for="search">Search</label>
                <input type="text" class="form-control" id="search" placeholder="Search something else...">
            </div>
            <button type="submit" class="btn btn-primary btn-large">Serch</button>
        </form>-->


    <div class="error-actions">
        <a href="{{ route(App\Helpers\Helper::cleanRoute(\App\Providers\RouteServiceProvider::HOME)) }}" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-home"></span>
            Voltar para à página inicial
        </a>
        <a href="#" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-envelope"></span> Contato
        </a>
    </div>
</div>