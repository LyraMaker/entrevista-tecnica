<section class="section">
  <div class="columns is-multiline is-variable is-4">
    <?php

    use function LyraMaker\Entrevista\Misc\generateYearsOld;

    foreach ($allUsers as $user): ?>
      <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
        <div class="card perfil-card">
          <div class="card-header perfil-header"></div>
          <div class="perfil-icone">
            <img src="<?=$_ENV['base_url']?>/var/profilePhotos/<?=$user->getProfile_photo()?>" alt="Foto de perfil" />
          </div>
          <div class="card-content perfil-conteudo">
            <p class="perfil-nome">
              <?= $user->getFirst_Name() . " " . $user->getSecond_Name(); ?>
              <span class="has-text-grey-light">
                | <?= generateYearsOld($user->getDate_birth()) ?>
              </span>
            </p>
            <p class="perfil-cidade"><?= $user->getCity(); ?></p>
          </div>
          <footer class="has-background-grey-light py-2">
            <div class="buttons is-justify-content-center">
              <button class="button is-warning">
                <span class="icon-text has-text-white">
                  <span class="icon"><i class="fi-xnsuxl-edit-solid"></i></span>
                  <a href="/update/<?= htmlentities($user->getUser_code()) ?>" class="has-text-white">Editar</a>
                </span>
              </button>
              <button class="button is-danger">
                <span class="icon-text has-text-white">
                  <span class="icon"><i class="fi-xnsuxl-trash-bin"></i></span>
                  <a href="/delete/<?= htmlentities($user->getUser_code()) ?>" class="has-text-white">Excluir</a>
                </span>
              </button>
            </div>
          </footer>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>