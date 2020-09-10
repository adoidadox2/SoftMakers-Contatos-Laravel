<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Contact</title>
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
    </style>
  </head>
  <body>
    <div class="container">
      <form
        method="POST"
        action="{{route('contacts.update',['contact'=>$contact->id])}}"
        class="form"
        enctype="multipart/form-data"
      >
      @csrf
      @method('put')
        <a href={{route('contacts.show', ['contact' => $contact->id])}}>
          <button type="button" class="list-button">Voltar para contato</button>
        </a>

        <h1>Editar Contato</h1>
        <input type="file" name="avatar" accept="image/*" class="input-field" />
        <input
          name="name"
          placeholder="Digite o nome"
          class="input-field"
          value={{ $contact->name }}
          required
        />

        @if ($contact->last_name)
        <input
          name="last_name"
          placeholder="Digite o sobrenome"
          class="input-field"
          value={{ $contact->last_name }}
        />
        @else
        <input
          name="last_name"
          placeholder="Digite o sobrenome"
          class="input-field"
        />
        @endif

        <input
          name="phone"
          placeholder="Digite o telefone"
          class="input-field"
          value={{ $contact->phone }}
          required
        />

        @if ($contact->email)
        <input
          name="email"
          placeholder="Digite o email"
          class="input-field"
          value={{ $contact->email }}
        />
        @else
        <input name="email" placeholder="Digite o email" class="input-field" />
        @endif

        @if ($contact->address->cep)
        <input
          name="cep"
          placeholder="Digite o cep"
          class="input-field"
          value={{ $contact->address->cep }}
        />
        @else
        <input name="cep" placeholder="Digite o cep" class="input-field" />
        @endif

        <input
          name="state"
          placeholder="Digite o estado"
          class="input-field"
          value={{ $contact->address->state }}
          required
        />

        <input
          name="city"
          placeholder="Digite o cidade"
          class="input-field"
          value={{ $contact->address->city }}
          required
        />

        @if ($contact->address->neighborhood)
        <input
          name="neighborhood"
          placeholder="Digite o bairro"
          value={{ $contact->address->neighborhood }}
          class="input-field"
        />
        @else
        <input
          name="neighborhood"
          placeholder="Digite o bairro"
          class="input-field"
        />
        @endif
        
        @if ($contact->address->street)
        <input
          name="street"
          placeholder="Digite o rua"
          class="input-field"
          value={{ $contact->address->street }}
        />
        @else
        <input name="street" placeholder="Digite o rua" class="input-field" />
        @endif
        
        @if ($contact->address->house_number)
        <input
          name="house_number"
          placeholder="Digite o número da casa"
          class="input-field"
          value={{ $contact->address->house_number }}
        />
        @else
        <input
          name="house_number"
          placeholder="Digite o número da casa"
          class="input-field"
        />
        @endif

        <button type="submit" class="form-button">Atualizar dados</button>
      </form>
    </div>
  </body>
</html>