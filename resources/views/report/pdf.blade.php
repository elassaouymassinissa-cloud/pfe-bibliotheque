

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport - {{ $user->user_name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        thead {
            background-color: #3498db;
            color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            
        
         
        }

        .signature-block {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin-top: 40px;
            padding-top: 5px;
        }

       
        .footer {
        position: fixed;
        bottom: 50px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 12px;
    }

       .footer.ee{
         bottom: 10px;
       }
        .sinad{
          text-align: left;
        }
        .sinem{
          text-align: right;
        }
    </style>
</head>
<body>

      <h2>Rapport de livres empruntes :<br></h2>
       <h4>Nom Emprunte : {{ $user->user_name }}<br></h4>
       <h4>Email Emprunte : {{ $user->email }}<br></h4>
       <h4>CNIC Emprunte : {{ $user->cnic_number }}<br></h4>
       <h4> phone Emprunte :{{ $user->phone_number }}<br></h4>
    <table>
        <thead>
            <tr>
                <th>Titre du livre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowedBooks as $book)
                <tr>
                    <td>{{ optional($book->book)->title ?? 'Livre inconnu' }}</td>
                    <td>{{ $book->borrow_date }}</td>
                    <td>{{ $book->return_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  <div class="footer">
    <div class="signatures">
        <div class="signature-blok ">
            <div class="signature-line sinad">Signature de l'administrateur :</div>
        </div>
        <div class="signature-block ">
            <div class="signature-line sinem">Signature de l'emprunteur :</div>
        </div>
    </div>
</div>
    <div class="footer ee">
      {{ now()->format('d/m/Y H:i') }}
    </div>
  
</body>
</html>
      

