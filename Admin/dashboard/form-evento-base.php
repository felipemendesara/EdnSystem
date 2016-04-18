<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="nome"  maxlength="40" placeholder="Evento" value="<?=$result->get('nome')?>"/>
    <span class="mdl-textfield__error">Dê um nome para o evento.</span>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="cliente" placeholder="Cliente"value="<?=$result->get('cliente')?>" />
    <span class="mdl-textfield__error">Insira um cliente para o evento</span>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="datetime" placeholder="Data/Hora"maxlength="19" size="19" onKeyPress="DataHora(event, this)" maxlength="10" name="data" value="<?=$result->get('data')?>" />
    <label class="mdl-textfield__label form-input-border" for="data"></label>
    <span class="mdl-textfield__error">Insira a data e hora do evento</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="cep" id="cep" placeholder="CEP"  value="<?=$result->get('cep')?>" />
    <span class="mdl-textfield__error">Insira o CEP</span>
</div>
</br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="rua" id="rua"placeholder="Endereço" value="<?=$result->get('rua')?>" />
    <span class="mdl-textfield__error">Insira um endereço para o evento</span>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="numero" id="numero" placeholder="Nº" value="<?=$result->get('numero')?>" />
    <span class="mdl-textfield__error">Insira o número</span>
</div>
<br>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="bairro" id="bairro" placeholder="Bairro"value="<?=$result->get('bairro')?>" />
    <span class="mdl-textfield__error">Insira o bairro</span>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="cidade" id="cidade" placeholder="Cidade"value="<?=$result->get('cidade')?>" />
    <span class="mdl-textfield__error">Insira a cidade</span>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="estado" id="estado" placeholder="Estado"value="<?=$result->get('estado')?>" />
    <span class="mdl-textfield__error">Insira o estado</span>
</div>
<br>
<label for="foto-produto">Capa:</label><br><input type="file" name="capa-evento">
<br>
