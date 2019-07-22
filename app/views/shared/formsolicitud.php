<form action="<?php echo RUTA_URL ?>/HomeController/enviarSolicitud" method="POST" id="form1" name="form1">
                                                <span id="msgValidation1" style="display: none;"></span>
                                                <span id="msgValidation" style="display: none;">El IMEI debe de estar formado por 14 o 15 números naturales.</span>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="fullname">Nombre Completo</label>
                                                        <input name="nombre" type="text" id="fullname" class="form-control required">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="mail">Correo Electronico</label>
                                                        <input name="mail" type="email" id="email" class="form-control required">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="servicio">Servicio</label>
                                                        <select name="servicio" id="servicio" class="form-control">
                                                            <?php foreach ($datos['servicios'] as $key => $value) {

                                                                echo ('<option value="' . $value->id . '">' . $value->name . ' </option>');
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row form-group" id="divOperadora">
                                                    <div class="col-md-12">
                                                        <label for="operadora">Operadora</label>
                                                        <select name="operadora" id="operadora" class="form-control">

                                                            <?php foreach ($datos['oper'] as $key => $value) {

                                                                echo ('<option value="' . $value->id . '">' . $value->operadoraname . ' </option>');
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="imei">IMEI</label>
                                                        <input type="text" pattern="[0-9]{14,15}" maxlength="15" onkeypress="return isNumberKey(event, this.value)" id="imei" name='imeitext' placeholder="Ingresa los 14 o 15 dígitos del IMEI" class="form-control required">
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <input type="submit" onclick="validar(document.form1.imeitext)" class="btn btn-primary btn-block" value="Solicitar">
                                                    </div>
                                                </div>
                                        </form>