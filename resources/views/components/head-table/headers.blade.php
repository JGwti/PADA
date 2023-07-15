

@inject('selects', 'App\Services\Selects')

<style>
    .text-size{
        font-size:75%;
    }
     .line-select {
      margin: 2em;
      padding: .5em;
      width: 12em;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }
    .line-name {
        width: 550px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-document {
        width: 280px;
        height: 20px;
        border: none;
        text-align:center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-month {
        width: 80px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-day {
        width: 40px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-year {
        width: 50px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-city {
        width: 300px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .p-justificado {
        text-align: justify;
        line-height: 2.5em;
        margin-left: 60px;
        margin-top: 40px;
        margin-right: 60px;
        margin-bottom: 40px;
    }

    .table {
        border-collapse: collapse;
        border: rgb(0, 0, 0) 2px solid;
        font-size:85%;
        margin-left: 65px;
        width: 80%;
        height: 5px;
    }
    .table-font {
        background: rgb(121, 125, 148);
    }
    .table-head {
        border-collapse: collapse;
        font-size:85%;
        margin-left: 65px;
        width: 80%;
        height: 5px;
    }
    .table-head-ms{
        border: 1px solid mediumblue;
        border-radius: 20PX;
        margin-left: 60px;
        margin-right: 60px;
    }
    img.escudo{
        width: 10px;
        height: 10px;
    }

</style>
<table class="table-head" CELLPADDING=10 CELLSPACING=0>
    <TR>
        <TD class="table-head-ms">
            <img src="{{ public_path('./storage/img/escudo.png')}}" width="50" height="50">
        </TD>
        <TD class="table-head-ms" ROWSPAN=2>
            {{$assent->form->typeForm->name_form}}
        </TD>
        <TD class="table-head-ms"> Código: </TD>
        <TD class="table-head-ms">
            {{$assent->form->typeForm->code_form}}
        </TD>
    </TR>
    <TR>
        <TD class="table-head-ms">
            <img src="{{ public_path('./storage/img/JDC.png')}}" width="50" height="30">
        </TD>
        <TD class="table-head-ms">Página: </TD>
        <TD class="table-head-ms"> 1 de 1 </TD>
    </TR>
</table>
