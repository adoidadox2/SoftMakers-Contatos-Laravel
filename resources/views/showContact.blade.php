<!DOCTYPE html>
<html lang="pf-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Details</title>
    <style>
      .container {
        width: 100vw;
        height: 100vh;
        background-color: #f5f5f5;
        display: flex;
        align-items: center;
        flex-direction: column;
      }
      .container-2 {
        width: 20%;
        height: min-content;
        background-color: #d3d3d3;
        display: flex;
        align-items: center;
        flex-direction: column;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      h1 {
        font-size: 28px;
        width: 80%;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-align: center;
        margin-bottom: 24px;
      }
      .avatar {
        width: 200px;
        height: 200px;
        border-radius: 50%;
      }
      .fields {
        display: flex;
        margin-top: 5px;
        text-align: start;
        align-items: center;
      }
      span {
        margin-right: 5px;
      }
      .already-admin {
        margin-top: 8px;
      }
      .edit-button {
        width: 100%;
        height: 48px;
        border-radius: 5px;
        border: 0;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background-color: #55efc4;
        margin-top: 10px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img src="{{ $contact->image }}" alt="avatar" class="avatar" />

      <div>
        <div class="fields">
          <span>Nome:</span>
          <h3>{{ $contact->name }}</h3>
        </div>
        <div class="fields">
          <span>Sobrenome:</span>
          <h3>{{ $contact->last_name }}</h3>
        </div>
        <div class="fields">
          <span>Telefone:</span>
          <h3>{{ $contact->phone }}</h3>
        </div>
        <div class="fields">
          <span>email:</span>
          <h3>{{ $contact->email }}</h3>
        </div>
      </div>
      <div class="container-2">
        <h2>Endereço</h2>
        <div>
          <div class="fields">
            <span>CEP:</span>
            <h3>{{ $contact->address->cep }}</h3>
          </div>
          <div class="fields">
            <span>Estado:</span>
            <h3>{{ $contact->address->state }}</h3>
          </div>
          <div class="fields">
            <span>Cidade:</span>
            <h3>{{ $contact->address->city }}</h3>
          </div>
          <div class="fields">
            <span>Bairro:</span>
            <h3>{{ $contact->address->neighborhood }}</h3>
          </div>
          <div class="fields">
            <span>Rua:</span>
            <h3>{{ $contact->address->street }}</h3>
          </div>
          <div class="fields">
            <span>Nº Casa:</span>
            <h3>{{ $contact->address->house_number }}</h3>
          </div>
        </div>
      </div>
      <a class="edit-user" href={{route('contacts.edit',['contact'=>$contact->id])}}>
        <button type="button" class="edit-button">Editar</button>
      </a>
      <a href="{{route('contacts.index')}}">
        <button type="button" class="edit-button">
          Voltar para a listagem
        </button>
      </a>
    </div>
  </body>
</html>