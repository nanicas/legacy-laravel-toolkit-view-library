## Importar SASS
Caso não exista, crie uma pasta em `resources` chamada `sass` e adicione um arquivo dentro com o nome de `app.scss` com o seguinte conteúdo:
```
@import '../vendor/legacy_laravel_toolkit_view_library/sass/bootstrap';
```

## Importar JS
Dentro da pasta `resources`, navegue até sua pasta `js` e edite seu arquivo `app.js`:
```
@import '../vendor/legacy_laravel_toolkit_view_library/js/bootstrap';
```

## Executar o comando de publicação dos arquivos de configuração
```
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:resources"
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:views"
php artisan vendor:publish --tag="legacy_laravel_toolkit_view_library:public"
```

## Configurar vite para copiar assets compartilhados

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
