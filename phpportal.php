<?php
session_start();

include "getContent.php";

?>
<!doctype <!DOCTYPE html>
<html>

<?php
include "head.php";
?>


<body>
    <div class="container-fluid">
        <div id="left" class="col-md-1 left" style="width:14%">
            <div id="setting">
                <div>

                </div>
                <form name="occupation-edit" method="post" action="">
                    <div clas="form-group">

                        <label class="vname" for="session-table">$_SESSION</label><br>
                        <!-- <table id="sessiontable" class="session-table">
                            <tr>
                                <td>Name</td>
                                <td>Value</td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" id="sname1" name="sname1"></td>
                                <td><input type="text" class="form-control" id="svalue1" name="svalue1"></td>
                            </tr>
                        </table>!-->
                        <textarea id="sessionString" class="varinput"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="vname" for="method">METHOD</label>
                        <table id="methodtable" class="method-table">
                            <tr>
                                <td><select class="form-control" name='selectMethod' id="selectMethod">
                                        <option value='get'>$_GET</option>
                                        <option value='post'>$_POST</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="form-group">
                        <label class="vname" id="parameterType" for="paratable"></label><br>
                        <textarea id="parameterString" class="varinput"></textarea>
                    </div>


                </form>

            </div>
            <div id="content">
                <?php getContents($root);?>
            </div>
        </div>
        <div class="col-md-10 right">
            <div class="toolbar">
                <button onclick="iframe1.history.back()"><span class="glyphicon glyphicon-arrow-left"></span></button>
                <button onclick="iframe1.history.forward()"><span
                        class="glyphicon glyphicon-arrow-right"></span></button>
                <button id="refresh" class=""><span class="glyphicon glyphicon-repeat"></span></button>

            </div>
            <iframe id="iframe1" name="iframe1" frameborder="0"></iframe>
        </div>
    </div>
    <form id="post-table" target='iframe1' method="post">
    </form>
</body>

</html>