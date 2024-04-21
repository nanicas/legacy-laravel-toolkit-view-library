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

## Instalar bibliotecas terceiras
Se você olhar no arquivo https://github.com/nanicas/legacy-laravel-toolkit-view-library/blob/main/resources/js/bootstrap.js, temos várias bibliotecas que precisam existir para que o `build` na etapa posterior funcione. Para isso, precisamos então executar os seguintes comandos:

```
npm i vite-plugin-static-copy

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

## Compilar assets
`npm run build`

```
> build
> vite build

vite v4.5.3 building for production...
✓ 482 modules transformed.
public/build/manifest.json                         1.04 kB │ gzip:   0.30 kB
public/build/assets/app-a6b74ef6.css             261.43 kB │ gzip:  35.35 kB
public/build/assets/purify.es-d6eec8ab.js         21.87 kB │ gzip:   8.69 kB
public/build/assets/index.es-18e47ed2.js         149.69 kB │ gzip:  51.12 kB
public/build/assets/html2canvas.esm-e0a7d97b.js  201.43 kB │ gzip:  48.04 kB
public/build/assets/app-aaa5687b.js              948.88 kB │ gzip: 315.51 kB

(!) Some chunks are larger than 500 kBs after minification. Consider:
- Using dynamic import() to code-split the application
- Use build.rollupOptions.output.manualChunks to improve chunking: https://rollupjs.org/configuration-options/#output-manualchunks
- Adjust chunk size limit for this warning via build.chunkSizeWarningLimit.
[vite-plugin-static-copy] Copied 4 items.
✓ built in 7.17s
```
