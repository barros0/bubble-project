<form class="form_reportar" action="reportar_post.php?id_pub=<?= $id_publicacao ?>" method="post">
    <div class="wrap_fechar_tit_reportar">
        <p>Reportar:</p>
        <i onclick="location.href='javascript:history.back()';" id="fechar_modal_reportar" class='bx bx-x'></i>
    </div>
    <div class="div_select_form_reportar">
        <label for="select_form_reportar">Selecione o problema:</label>
        <select name="select_form_reportar">
            <option value="Nudez">Nudez</option>
            <option value="Violência">Violência</option>
            <option value="Assédio">Assédio</option>
            <option value="Informação Falsa">Informação Falsa</option>
            <option value="Spam">Spam</option>
            <option value="Outro">Outro</option>
        </select>
    </div>
    <div class="div_reportar_coment">
        <label for="reportar_coment">Diga nos o motivo:</label>
        <textarea name="reportar_coment" required></textarea>
    </div>
    <input type="submit" value="Reportar">
</form>