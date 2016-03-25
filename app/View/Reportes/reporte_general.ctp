
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <!-- recent orders table -->
        <div class="panel">
            <div class="panel-menu p12 admin-form theme-primary">
                <div class="row">
                    <div class="col-md-4">
                        <label class="field select">
                            <?php echo $this->Form->select('Dato.regione_id', $regiones, array('empty' => 'Seleccione la Region')) ?>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="field select">
                            <?php echo $this->Form->select('Dato.dias', $dias_v, array('empty' => 'Seleccione el vencimiento')) ?>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="field select">
                            <select id="bulk-action" name="bulk-action">
                                <option value="0">Actions</option>
                                <option value="1">Edit</option>
                                <option value="2">Delete</option>
                                <option value="3">Active</option>
                                <option value="4">Inactive</option>
                            </select>
                            <i class="arrow double"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="panel-body pn">
                <div class="table-responsive">
                    <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">Select</th>
                                <th class="">Image</th>
                                <th class="">Product Title</th>
                                <th class="">SKU</th>
                                <th class="">Price</th>
                                <th class="">Stock</th>
                                <th class="text-right">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg">
                                </td>
                                <td class="">Apple Ipod 4G - Silver</td>
                                <td class="">#21362</td>
                                <td class="">$215</td>
                                <td class="">1,400</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg">
                                </td>
                                <td class="">Apple Smart Watch - 1G</td>
                                <td class="">#15262</td>
                                <td class="">$455</td>
                                <td class="">2,100</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg">
                                </td>
                                <td class="">Apple Macbook 4th Gen - Silver</td>
                                <td class="">#66362</td>
                                <td class="">$1699</td>
                                <td class="">6,100</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg">
                                </td>
                                <td class="">Apple Iphone 16GB - Silver</td>
                                <td class="">#51362</td>
                                <td class="">$1299</td>
                                <td class="">5,200</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_3.jpg">
                                </td>
                                <td class="">Apple Ipod Nano 2G - Silver</td>
                                <td class="">#4132</td>
                                <td class="">$995</td>
                                <td class="">11,000</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_4.jpg">
                                </td>
                                <td class="">Apple Macbook 3rd Gen - Silver</td>
                                <td class="">#21362</td>
                                <td class="">$1,150</td>
                                <td class="">4,300</td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg">
                                </td>
                                <td class="">Apple Smart Watch - 1G</td>
                                <td class="">#15262</td>
                                <td class="">$455</td>
                                <td class="text-warning">
                                    <b>145</b>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-warning br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Disabled
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_5.jpg">
                                </td>
                                <td class="">Apple iMac 32" - Silver</td>
                                <td class="">#21362</td>
                                <td class="">$1299</td>
                                <td class="text-warning">
                                    <b>180</b>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-warning br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Disabled
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_3.jpg">
                                </td>
                                <td class="">Apple Ipod Nano 2G - Silver</td>
                                <td class="">#4132</td>
                                <td class="">$995</td>
                                <td class="text-danger">
                                    <b>0 - Sold Out</b>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Sold Out
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg">
                                </td>
                                <td class="">Apple Macbook 4th Gen - Silver</td>
                                <td class="">#66362</td>
                                <td class="">$1699</td>
                                <td class="text-danger">
                                    <b>0 - Sold Out</b>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Sold Out
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                <td class="w100">
                                    <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg">
                                </td>
                                <td class="">Apple Iphone 16GB - Silver</td>
                                <td class="">#51362</td>
                                <td class="">$1299</td>
                                <td class="text-danger">
                                    <b>0 - Sold Out</b>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Sold Out
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">Complete</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Pending</a>
                                            </li>
                                            <li>
                                                <a href="#">Canceled</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>