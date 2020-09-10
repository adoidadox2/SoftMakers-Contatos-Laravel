<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .container {
        width: 100vw;
        height: 100vh;
        background-color: #f5f5f5;
        display: flex;
        align-items: center;
        flex-direction: column;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td,
      th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #dddddd;
      }
      td a {
        display: block;
        padding: 16px;
      }
      .form-button {
        width: 80%;
        height: 48px;
        border-radius: 5px;
        border: 0;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background-color: #55efc4;
        margin: 16px 0;
      }
    </style>
    <title>List Contacts</title>
  </head>
  <body>
    <div class="container">
      <a href="{{route('contacts.create')}}">
        <button type="button" class="form-button">
          Adicionar Novo Contato
        </button>
      </a>
      <table>
        <tr>
          <th>Avatar</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Telefone</th>
        </tr>

        @foreach ($contacts as $contact)
        <tr>
          <td>
            <a href="{{route('contacts.show', ['contact' => $contact->id])}}">
              <img src="{{  $contact->image_url  }}" alt="avatar" class="avatar" />
            </a>
          </td>
          <td>
            <a href="{{route('contacts.show', ['contact' => $contact->id])}}"> {{ $contact->name }} </a>
          </td>
          <td>
            <a href="{{route('contacts.show', ['contact' => $contact->id])}}"> {{ $contact->last_name }} </a>
          </td>
          <td>
            <a href="{{route('contacts.show', ['contact' => $contact->id])}}"> {{ $contact->phone }} </a>
          </td>
          <td>
            <form action="{{route('contacts.destroy', ['contact' => $contact->id])}}" method="post">
              @csrf
              @method('delete')
              <button type="submit">Deletar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </body>
</html>