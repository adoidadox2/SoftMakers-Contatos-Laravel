<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Contact</title>
    <style>
      .input-field {
        width: 80%;
        padding: 5px 15px;
        font-size: 16px;
        border-radius: 5px;
        margin-bottom: 7px;
      }
      .form {
        display: flex;
        flex-direction: column;
        width: 30%;
        height: 100%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
      }
      .container {
        width: 100vw;
        height: 100vh;
        background-color: #f5f5f5;
      }
      .form-button {
        width: 80%;
        height: 32px;
        border-radius: 5px;
        border: 0;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background-color: #55efc4;
      }
      .list-button {
        width: 80%;
        height: 48px;
        border-radius: 5px;
        border: 0;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background-color: #55efc4;
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
    </style>
  </head>
  <body>
    <div class="container">
      <form
        method="POST"
        action="{{route('contacts.store')}}"
        class="form"
        enctype="multipart/form-data"
      >
      @csrf
      <a href="{{route('contacts.index')}}">
        <button type="button" class="list-button">Listar Contatos</button>
      </a>
        <h1>Adicionar Contatos</h1>
        <input type="file" name="avatar" accept="image/*" class="input-field" />
        <input
          name="name"
          placeholder="Digite o nome*"
          class="input-field"
          required
        />
        <input
          name="last_name"
          placeholder="Digite o sobrenome"
          class="input-field"
        />
        <input
          name="phone"
          placeholder="Digite o telefone*"
          class="input-field"
          required
        />
        <input name="email" placeholder="Digite o email" class="input-field" />
        <input name="cep" placeholder="Digite o cep" class="input-field" />
        <input
          name="state"
          placeholder="Digite o estado*"
          class="input-field"
          required
        />
        <input
          name="city"
          placeholder="Digite o cidade*"
          class="input-field"
          required
        />
        <input
          name="neighborhood"
          placeholder="Digite o bairro"
          class="input-field"
        />
        <input name="street" placeholder="Digite o rua" class="input-field" />
        <input
          name="house_number"
          placeholder="Digite o número da casa"
          class="input-field"
          type="number"
        />
        <button type="submit" class="form-button">Adicionar</button>
      </form>
    </div>
  </body>
</html>