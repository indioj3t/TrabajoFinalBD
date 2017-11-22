<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">

<title>Administrador de Tiquete</title>
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
   <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script> 

</head>
<body oncontextmenu="return false">
    <section>  
        <table id="dg" title="Visitas" class="easyui-datagrid" style="width:800px;height:250px"
            url="Tiquete"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="idd" width="50">ID</th>
                <th field="nombre" width="50">nombre</th>
                <th field="apellido" width="50">apellidos</th>
                <th field="destino" width="50">destino</th>
                <th field="valor_tiquete" width="50">valor_tiquete</th>
            </tr>
        </thead>
        <?php foreach($listTiquetes as $tiquete): ?>
        <?php
            echo '<tr>
                        <td>'.$tiquete['Id'].'</td>
                        <td>'.$tiquete['nombre'].'</td>
                        <td>'.$tiquete['apellidos'].'</td>
                        <td>'.$tiquete['destino'].'</td>
                        <td>'.$tiquete['valor_tiquete'].'</td>
                </tr>';
        ?>
        <?php endforeach; ?>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="eliminar()">ELiminar</a>
    <span>>></span>
    <input id="pe1" name="pe1" style="line-height:18px;border:1px solid #ccc"/>
    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Buscar</a>
    <a href="retroceder" class="easyui-linkbutton" iconCls="icon-back" plain="true">atras</a>
    </div>

    
    <div name="dlg" id="dlg" class="easyui-dialog" style="width:300px;height:250px;padding:10px 20px"
            closed="true" buttons="#dlg-buttons">
        <div class="ftitle">TIQUETE</div>
        <form id="formulario" name="formulario" method="post" action="agregar">
            <input id="idd" name="idd" type="hidden">
            <div class="fitem">
                 <label>nombre:</label>
                <input id="nombre" name="nombre" class="easyui-textbox" required="true">
                 <label>apellidos:</label>
                <input id="apellido" name="apellido" class="easyui-textbox" required="true">
                 <label>destino:</label>
                <input id="destino" name="destino" class="easyui-textbox" required="true">
                 <label>valor_tiquete:</label>
                <input id="valor_tiquete" name="valor_tiquete" class="easyui-textbox" required="true">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardar()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <div name="dl" id="dl" class="easyui-dialog" style="width:300px;height:250px;padding:10px 20px"
            closed="true" buttons="#dlg-buttons">
        <div class="ftitle">Eliminar</div>
        <form id="formu" name="formu" method="post" action="eliminar">
            <input id="idd" name="idd" type="hidden">
            <div class="fitem">
                 <label>nombre:</label>
                <input id="nombre" name="nombre" class="easyui-textbox" required="true">
                 <label>apellidos:</label>
                <input id="apellido" name="apellido" class="easyui-textbox" required="true">
                 <label>destino:</label>
                <input id="destino" name="destino" class="easyui-textbox" required="true">
                 <label>valor_tiquete:</label>
                <input id="valor_tiquete" name="destino" class="easyui-textbox" required="true">
            </div>
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="elimina()" style="width:90px">eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dl').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <script type="text/javascript">
        function nuevo(){
            $('#dlg').dialog('open').dialog('setTitle','Nuevo');
            $('#formulario').form('clear');
        }
        
        function editar(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('setTitle','Editar');
                $('#formulario').form('clear');
                $('#formulario').form('load', row);
            }
        }
        function eliminar(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dl').dialog('open').dialog('setTitle','Eliminar');
                $('#formu').form('clear');
                $('#formu').form('load', row);
            }
        }

        function guardar(){
            document.getElementById("formulario").submit();       
        }

        function elimina(){
            document.getElementById("formu").submit();  
        }

    function doSearch(){
        Object.get = function(obj) {
            var size= new Array(); 
            res = new Object; var key, i=0;
            for (key in obj) {
            size[i]={idd:obj[i].idd,descripcion:obj[i].descripcion};
            i++;
            }
            return size;
        };
        $.post( "listarFiltro", { key: valor=$('#pe1').val() })
          .done(function( data ) {
          var res = data.split("----");
          var info = new Object();
          for(i=0; i<res.length-1; i++){
            var res2 = res[i].split("::::");
            info[i]={"idd":res2[0],"descripcion":res2[1]};
          }
          var data2 = {"total":Object.keys(info).length,"rows":Object.get(info)};
          $('#dg').datagrid('loadData', data2);
          });
    }
    </script>
    <style type="text/css">
    
        #fm{
            margin:0;
            padding:10px 30px;
        }
        .ftitle{
            font-size:14px;
            font-weight:bold;
            padding:5px 0;
            margin-bottom:10px;
            border-bottom:1px solid #ccc;
        }
        .fitem{
            margin-bottom:5px;
        }
        .fitem label{
            display:inline-block;
            width:80px;
        }
        .fitem input{
            width:160px;
        }
    </style>
    </section>
</body>

</html>
