<?php
require_once("include/header.php");
?>
<div class="container-fluid">
    <div class="col-md-6 col-lg-offset-3" style="margin-top:15px">
        <form class="form-inline"id="form" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="">Ultra Code:</label>
                <input type="text" class="form-control input-sm" name="ultra_code" value="<?= isset($_REQUEST['ultra_code']) ? $_REQUEST['ultra_code'] : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-default btn-sm btn-info" id="formButton" data-loading-text="Please Wait...">Submit</button>
        </form>
    </div>
    <div class="col-md-6 col-lg-offset-3">
        <hr>
    </div>
    <?php
    if (isset($_REQUEST) && isset($_REQUEST['ultra_code'])) {
        try {
            $client = new SoapClient("http://customer.ultra-group.co.uk/?WSDL", array('soap_version' => SOAP_1_2));
            $response = $client->ItemStockLevel(array("UltraCode" => $_REQUEST['ultra_code']));

            if (isset($response->ItemStockLevelResult)) {
                ?>
                <div class="col-md-6 col-lg-offset-3" style="margin-top:15px;">
                    <table class="table table-condensed table-bordered table-responsive" id="">
                        <thead>
                            <tr>
                                <th class="nosort" style="width:40%">Product Name</th>
                                <th>Product Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Code</td>
                                <td><?= isset($response->ItemStockLevelResult->Code) ? $response->ItemStockLevelResult->Code : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?= isset($response->ItemStockLevelResult->Description) ? $response->ItemStockLevelResult->Description : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Stock Holding</td>
                                <td><?= isset($response->ItemStockLevelResult->StockHolding) ? $response->ItemStockLevelResult->StockHolding : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Weekly Forecast</td>
                                <td><?= isset($response->ItemStockLevelResult->WeeklyForecast) ? $response->ItemStockLevelResult->WeeklyForecast : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Next Pod Date</td>
                                <td><?= isset($response->ItemStockLevelResult->NextPODate) ? $response->ItemStockLevelResult->NextPODate : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Delivery Date</td>
                                <td><?= isset($response->ItemStockLevelResult->DeliveryDate) ? $response->ItemStockLevelResult->DeliveryDate : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Next PO Qty</td>
                                <td><?= isset($response->ItemStockLevelResult->NextPOQty) ? $response->ItemStockLevelResult->NextPOQty : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Week No</td>
                                <td><?= isset($response->ItemStockLevelResult->WeekNo) ? $response->ItemStockLevelResult->WeekNo : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Stock In W</td>
                                <td><?= isset($response->ItemStockLevelResult->StockInW) ? $response->ItemStockLevelResult->StockInW : ''; ?></td>
                            </tr>
                            <tr>
                                <td>WO Delivery Date</td>
                                <td><?= isset($response->ItemStockLevelResult->WODeliveryDate) ? $response->ItemStockLevelResult->WODeliveryDate : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Next WO Qty</td>
                                <td><?= isset($response->ItemStockLevelResult->NextWOQty) ? $response->ItemStockLevelResult->NextWOQty : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Life Cycle</td>
                                <td><?= isset($response->ItemStockLevelResult->LifeCycle) ? $response->ItemStockLevelResult->LifeCycle : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td><?= isset($response->ItemStockLevelResult->Weight) ? $response->ItemStockLevelResult->Weight : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Packaging Height</td>
                                <td><?= isset($response->ItemStockLevelResult->PackagingHeight) ? $response->ItemStockLevelResult->PackagingHeight : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Packaging Length</td>
                                <td><?= isset($response->ItemStockLevelResult->PackagingLength) ? $response->ItemStockLevelResult->PackagingLength : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Packaging Width</td>
                                <td><?= isset($response->ItemStockLevelResult->PackagingWidth) ? $response->ItemStockLevelResult->PackagingWidth : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Qty On Purchase In 30 Days</td>
                                <td><?= isset($response->ItemStockLevelResult->QtyOnPurchaseIn30Days) ? $response->ItemStockLevelResult->QtyOnPurchaseIn30Days : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Qty On Purchase In 60 Days</td>
                                <td><?= isset($response->ItemStockLevelResult->QtyOnPurchaseIn60Days) ? $response->ItemStockLevelResult->QtyOnPurchaseIn60Days : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Qty On Purchase In 90 Days</td>
                                <td><?= isset($response->ItemStockLevelResult->QtyOnPurchaseIn90Days) ? $response->ItemStockLevelResult->QtyOnPurchaseIn90Days : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Stock Analysis</td>
                                <td><?= isset($response->ItemStockLevelResult->StockAnalysis) ? $response->ItemStockLevelResult->StockAnalysis : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Stock Analysis</td>
                                <td><?= isset($response->ItemStockLevelResult->StockAnalysis) ? $response->ItemStockLevelResult->StockAnalysis : ''; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                ?>
                <div class="col-md-6 col-lg-offset-3" style="margin-top:15px;">
                    <span class="text-danger"><strong>No Results found for the Product Code - <?= $_REQUEST['ultra_code']; ?></strong></span>
                </div>
                <?php
            }
        } catch (Exception $ex) {
            ?>
            <div class="col-md-6 col-lg-offset-3" style="margin-top:15px;">
                <span class="text-danger"><strong><?= $ex->getMessage(); ?></strong></span>
            </div>
            <?php
        }
    }
    ?>

</div>
<?php require_once("include/footer.php"); ?>
