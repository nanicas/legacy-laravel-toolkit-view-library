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

## Configurar o `provider` como gatilho
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

## Instalar bibliotecas complementares
```
npm install vite-plugin-static-copy@^0.17.0
```

## Instalar bibliotecas terceiras
Se olharmos no arquivo https://github.com/nanicas/legacy-laravel-toolkit-view-library/blob/main/resources/js/bootstrap.js, temos várias bibliotecas que precisam existir para que o `build` na etapa posterior funcione. Para isso, precisamos então executar os seguintes comandos:

```
npm install \
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
                {
                    src: 'resources/vendor/legacy_laravel_toolkit_view_library/vendor/bootstrap-theme/feather.min.js',
                    dest: 'vendor/bootstrap-theme'
                },
            ]
        })
    ],
});

```
