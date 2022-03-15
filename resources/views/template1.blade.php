    <!DOCTYPE html>
    <html lang="fr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ProjetBudget</title>
        <!--url() construit une urle à partir de l'URL courante : public-->
          <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet" type="text/css" >

        @yield('css')
      </head>
      <body>
        <main class="section">
            <div class="container">
                @yield('contenu')
            </div>
        </main>
      </body>
    </html>
