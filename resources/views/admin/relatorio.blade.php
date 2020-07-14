<!DOCTYPE html>
<html>
  <head>
    <style>
      @page{
        margin: 0px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
      }

      body{
        margin: 0;
        padding: 0;
        font-family: Georgia, 'Times New Roman', Times, serif;
      }

      .header{
        position: fixed;
        top: -70px;
        left: 0;
        right: 0;

        width: 100%;
        text-align: center;
        background: #555555;
        padding: 10px;
      }

      .footer{
        position: fixed;

        bottom: -27px;
        left: 0;

        width: 100%;
        padding: 5 px 10px 10px 10px;
        text-align: center;
        color: #ffffff;
      }

      .footer .page:after{
        content: counter(page);
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>

  <body>

    <h2>HTML Table</h2>
    

    <div class="footer">
      Gerado dia <? date( DATE_W3C); ?> <span class="page"> Página</span>
    </div>

    <div>
        <table>
            <thead>
                <tr>          
                <th>ID</th>
                <th>Nome</th>                                
                <th>Email</th>  
                <th>Criado em</th>                              
                </tr>
            </thead>

            <tbody>
            
                @forelse ($users as $user)
                <tr>              
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>                                          
                <td>{{ $user->email  }}</td>                          
                <td>{{ $user->created_at }}</td>                            
                </tr>
            @empty
            @endforelse  

            </tbody>
        </table>
    </div>

  </body>
</html>



