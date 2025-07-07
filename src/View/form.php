<section class="section">

  <form method="post" <?= $operation == 'update' ? "action='/update'" : "action='/create'"; ?> enctype="multipart/form-data">
    <input type="hidden" name="user_code" value="<?= $user?->getUser_code() ?? '' ?>">
    <div class="container">
      <header class="m-4">
        <h1 class="title is-3 has-text-centered">
          Perfil do usuário
        </h1>
      </header>

      <div class="columns is-variable is-5 m-3 is-flex-wrap-wrap">

        <div class="column is-flex is-align-items-center is-justify-content-center is-one-third perfil-coluna">
          <div class="is-flex is-flex-direction-column is-align-items-center mb-5">
            <figure class="perfil-icone-preview image mb-3">
              <img id="foto-perfil" src="<?= $user?->getProfile_photo() ? $_ENV['base_url'].'/var/profilePhotos/'.$user->getProfile_photo() : '' ?>" alt="Foto de perfil" class="is-rounded" />
            </figure>
            <label for="upload-foto" id="btn-mudar-foto" class="has-text-link is-size-6 is-clickable" href="#">Mudar foto</label>
            <input type="file" id="upload-foto" name="profile_photo" accept="image/*" hidden>
          </div>

        </div>

        <div class="column is-two-thirds">
          <div class="block">
            <p class="title is-5 mb-3">Dados pessoais</p>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="first_name" placeholder="Primeiro nome" value="<?= $user?->getFirst_name() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xwluxl-address-card-solid"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="second_name" placeholder="Sobrenome" value="<?= $user?->getSecond_name() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xwluxl-address-card-solid"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="date" name="date_birth" placeholder="Data de nascimento" value="<?= $user?->getDate_birth() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xnsuxl-calendar-solid"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="block">
            <p class="title is-5 mb-3">Endereço</p>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="street" placeholder="Nome da rua" value="<?= $user?->getStreet() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xnsuxl-map-marker-solid"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="city" placeholder="Cidade" value="<?= $user?->getCity() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xnsuxl-map-marker-solid"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="neighborhood" placeholder="Bairro" value="<?= $user?->getNeighborhood() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xnsuxl-map-marker-solid"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="text" name="state" placeholder="Estado" value="<?= $user?->getState() ?? '' ?>" />
                <span class="icon is-small is-left">
                  <i class="fi-xnsuxl-map-marker-solid"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column is-full">
          <p class="title is-5 mb-3">Descrição</p>
          <div class="field">
            <div class="control">
              <textarea class="textarea" name="description" placeholder="Escreva sobre você..."><?= $user?->getDescription() ?? '' ?></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-grouped is-grouped-right mt-5">
        <div class="control">
          <button
            class="button <?= $operation === 'update' ? 'is-warning' : 'is-dark' ?>"
            type="submit">
            <?= $operation === 'update' ? 'Editar' : 'Cadastrar' ?>
          </button>
        </div>
      </div>
    </div>
  </form>
</section>