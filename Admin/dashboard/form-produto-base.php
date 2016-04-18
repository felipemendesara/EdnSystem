        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="nome-produto" value="<?=$result->get('nome')?>" />
            <label class="mdl-textfield__label form-input-border" for="nome-produto">Nome:</label>
            <span class="mdl-textfield__error">Insira o nome do produto!</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="categoria-produto" >
                <?php foreach ($categorias as $categoria) : ?>
                    <?php  $essaCategoria = $result->get('categoria') == $categoria->get('categoria');
                    $selecao = $essaCategoria ? "selected='selected'" : ""; ?>
                    <option value="<?= $categoria->get('categoria')?>" <?=$selecao?> ><?= $categoria->get('categoria')?></option>
                <?php endforeach ?>
            </select>
            <label class="mdl-textfield__label form-input-border" for="categoria-produto">Categoria:</label>
            <span class="mdl-textfield__error">Escolha uma categoria!</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" min="1" pattern="-?[0-9]*(\.[0-9]+)?" name="quantidade-produto" value="<?=$result->get('quantidade')?>" />
            <label class="mdl-textfield__label form-input-border" for="quantidade-produto">Quantidade:</label>
            <span class="mdl-textfield__error">Insira a quantidade de produtos a serem cadastrados!</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" step="any" pattern="-?[0-9]*(\.[0-9]+)?" name="valor-produto" value="<?=$result->get('valor')?>" />
            <label class="mdl-textfield__label form-input-border" for="valor-produto">Valor Unitário:</label>
            <span class="mdl-textfield__error">Insira o valor do produto!</span>
        </div>
        <br>
        <div>
        	<label for="foto-produto">Foto do produto:</label>
			<br>
			<input type="file" name="foto-produto">
		</div>