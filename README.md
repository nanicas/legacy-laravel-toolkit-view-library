> Atenção: Todos os comandos abaixo deverão ser executados em seu projeto principal.

## Instalar dependência

```
composer require nanicas/legacy-laravel-toolkit-view-library:dev-main
```

## Importar SASS

Caso não exista, crie uma pasta chamada `sass` em `/resources` e adicione um arquivo dentro com o nome de `app.scss` com o seguinte conteúdo:
```
@import '../vendor/legacy_laravel_toolkit_view_library/sass/bootstrap';
```

## Importar JS

Dentro da pasta `/resources`, navegue até sua pasta `js` e edite seu arquivo `app.js`:
```
import '../vendor/legacy_laravel_toolkit_view_library/js/bootstrap';
```

## Configurar o `Provider` como gatilho

Edite o arquivo `<app_name>/config/app.php` e adicione a linha:
```
'providers' => [
    \Nanicas\LegacyLaravelToolkitView\Providers\BootstrapServiceProvider::class,
]
```

## Executar o comando de publicação dos arquivos de configuração

```
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:resources"
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:views"
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:public"
```

## Instalar bibliotecas terceiras

Se olharmos no arquivo https://github.com/nanicas/legacy-laravel-toolkit-view-library/blob/main/resources/js/bootstrap.js, temos várias bibliotecas que precisam existir para que o `build` na etapa posterior funcione. Para isso, precisamos então executar os seguintes comandos:

```
npm install vite-plugin-static-copy@^0.17.0
```

```
npm install \
  bootstrap-icons \
  jquery \
  jquery-mask-plugin \
  ladda \
  chart.js \
  @kurkle/color \
  select2 \
  jspdf \
  datatables.net-bs5 \
  datatables.net-plugins
```

### Bibliotecas complementares

**PHP**:
```
composer require yajra/laravel-datatables:^10.0
```

```
php artisan vendor:publish --tag=datatables
```

## Configurar vite para copiar assets globais

```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/vendor/legacy_laravel_toolkit_view_library/vendor/chartjs/utils.js',
                    dest: 'vendor/chartjs'
                },
                {
                    src: 'resources/vendor/legacy_laravel_toolkit_view_library/vendor/select2/i18n/pt-BR.js',
                    dest: 'vendor/select2/i18n'
                },
                {
                    src: 'resources/vendor/legacy_laravel_toolkit_view_library/vendor/select2/custom.css',
                    dest: 'vendor/select2'
                },
                // {
                //     src: 'resources/vendor/legacy_laravel_toolkit_view_library/vendor/bootstrap-theme/feather.min.js',
                //     dest: 'vendor/bootstrap-theme'
                // },
            ]
        })
    ],
});

```

## Observações

### Antes de invocar uma View estrutural
Antes de chamar qualquer `view` que dependa da estrutura básica de layout, tenha certeza de que o método `beforeView` do controller **base/herdado** está sendo chamado também, exemplo:

```php
/**
 * Show the application's login form.
 *
 * @return \Illuminate\View\View
 */
public function showLoginForm()
{
    parent::beforeView(request());

    return view('auth.login');
}
```

Existem várias variáveis e comportamentos que precisam ser compartilhada/os com uma view estrutural, por isso na necessidade da chamada, referências:

- https://github.com/nanicas/legacy-laravel-toolkit-library/blob/main/app/Http/Controllers/Controller.php#L50
- https://github.com/nanicas/legacy-laravel-toolkit-library/blob/main/app/Http/Controllers/CrudController.php#L82
- https://github.com/nanicas/legacy-laravel-toolkit-library/blob/main/app/Http/Controllers/DashboardController.php#L41

## Exemplos

### Criar um CRUD do zero

Abaixo, serão listados os arquivos que estarão envolvidos durante a criação de um módulo novo, nesse caso, iremos usar o exemplo de `suppliers` (fornecedores):

```bash
new file:   app/Handlers/SupplierHandler.php
new file:   app/Http/Controllers/Pages/SupplierController.php
new file:   app/Models/Supplier.php
new file:   app/Repositories/SupplierRepository.php
new file:   app/Services/SupplierService.php
new file:   app/Validators/SupplierValidator.php
new file:   database/migrations/2023_04_04_084932_create_suppliers_table.php
new file:   public/resources/pages/supplier/create.css
new file:   public/resources/pages/supplier/create.js
new file:   public/resources/pages/supplier/form.css
new file:   public/resources/pages/supplier/form.js
new file:   public/resources/pages/supplier/index.css
new file:   public/resources/pages/supplier/index.js
new file:   public/resources/pages/supplier/list.css
new file:   public/resources/pages/supplier/list.js
new file:   public/resources/pages/supplier/show.css
new file:   public/resources/pages/supplier/show.js
modified:   resources/views/layouts/dashboard.blade.php
new file:   resources/views/pages/supplier/create.blade.php
new file:   resources/views/pages/supplier/form.blade.php
new file:   resources/views/pages/supplier/index.blade.php
new file:   resources/views/pages/supplier/list-buttons.blade.php
new file:   resources/views/pages/supplier/list.blade.php
new file:   resources/views/pages/supplier/show.blade.php
modified:   routes/web.php
```

- Pendência: criar uma pasta contendo todos os arquivos, mantendo a estrutura da árvore.

### Personalizar lista de pesquisa

Basta adicionar uma função de callback no objeto global `DASHBOARD`, exemplo:

```js
DASHBOARD.callbacks.eachSearchItem = function (row, element) {
    element.append(`\
        <li>
            <a class="dropdown-item">
                <div>${row}</div>
            </a>
        </li>`);
};
```

Exemplo de resposta durante a pesquisa no servidor:

URL: `GET /dashboard/search?query=teste`

```json
{
    "response": {
        "result": [
            "user x",
            "user y",
            "user z"
        ],
        "message": "<div class=\"alert alert-success\">\n Ação executada com sucesso!\n</div>"
    },
    "status": true
}
```
