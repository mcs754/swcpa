<?php
$titulo = "swcpa";
include 'cabecalho.php';
?>
<div class="container cabecalho recuo">
    <h1>Bem-vindo ao swcpa!</h1>
    <div class="row">
        <div class="col-sm-8">
            Aqui você poderá gerenciar o arquivo escolar da Escola Estadual de Ensino Médio em Tempo Integral Marechal
            Rondon.
            A seguir, listamos algumas recomendações importantes.
            <ul>
                <li>
                    Recomendamos nomear a pasta de arquivo morto apenas com a letra inicial do nome dos estudantes que
                    estão dentro da mesma, em seguida do seu número. Exemplo: <b>A1</b>, que neste caso refere-se a pasta
                    de arquivo morto de estudantes com nomes que começam com a letra <b>A</b>, sendo esta a primeira
                    pasta, seu número é <b>1</b>. Outro caso seria das pastas de estudantes formandos. Exemplo:
                    <b>Formandos 2018</b>, que neste caso refere-se à pasta de estudantes que concluíram o ensino
                    médio no ano de 2018.
                </li>
                <li>
                    Se você clicar no menu <a href="arquivo-listar-todos.php" style="text-decoration: none;"><kbd>Listar
                    todos</kbd></a> da aba Arquivo, serão listadas através de uma tabela, todas as pastas de arquivo
                    morto cadastradas. Nestas pastas existem estudantes vinculados, portanto, pense duas vezes
                    antes de excluir uma pasta. Uma vez que se exclua uma pasta de aquivo morto,
                    os estudantes vinculados serão excluídos para sempre.
                </li>
                <li>
                    Quando você for alterar uma pasta de estudante, o campo de observação não preenche automaticamente
                    os dados gravados como acontece com o restante dos campos. Recomendamos que se leia antes a observação
                    que está salva e decida se deve ou não digitá-la novamente.
                </li>
                <li>
                    No arquivo da escola mencionada existem pastas de estudantes guardadas desde 1981. Portanto,
                    quanto menos acessos físicos às pastas, melhor pra elas.
                </li>
            </ul>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <div class="nav-item">
            <i class="fas fa-info-circle" title="Informação"></i> Em caso de dúvidas, envie e-mail para o
            <a href="mailto:mcs754@gmail.com" class="link">administrador</a>. Antes de realizar alterações nos registros
            salvos, certifique-se de que realmente é necessário.
        </div>
    </nav>
</div>
<?php
include 'rodape.php';
?>
