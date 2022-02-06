<div>
    <div class="modal fade" id="modal-calculator" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">คิดเงิน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4" style="padding: 0;background: gray;">
                                <h1 class="text-right" style="margin: 0;color: yellow;">
                                    {{ $moneyText }}
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    wire:click="handleClick(7,'number')">
                                    <h2>7</h2>
                                </button>
                            </td>
                            <td width="25%">
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(8,'number')">
                                    <h2>8</h2>
                                </button>
                            </td>
                            <td width="25%">
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(9,'number')">
                                    <h2>9</h2>
                                </button>
                            </td>
                            <td width="25%">
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(1000,'money')">
                                    <h2>1000</h2>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(4,'number')">
                                    <h2>4</h2>
                                </button> 
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(5,'number')">
                                    <h2>5</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(6,'number')">
                                    <h2>6</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(500,'money')">
                                    <h2>500</h2>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(1,'number')">
                                    <h2>1</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(2,'number')">
                                    <h2>2</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(3,'number')">
                                    <h2>3</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(100,'money')">
                                    <h2>100</h2>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick('.','number')">
                                    <h2>.</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleClick(0,'number')">
                                    <h2>0</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="clearMoney">
                                    <h2>X</h2>
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flag" 
                                    style="font-size-:2rem;"
                                    wire:click="handleTotal">
                                    <h2>เต็ม</h2>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center bg-maroon">ยอดสินค้า</td>
                            <td colspan="2" style="padding: 0;background: gray;">
                                <h1 class="text-right" style="margin: 0;color: yellow;">
                                    {{ $productTotalText }}
                                </h1>
                            </td>
                            <td rowspan="3" style="padding: 0;">
                                <button 
                                    type="button" 
                                    class="btn btn-block btn-flat btn-primary" 
                                    style="font-size: 2rem;padding: 50px;" 
                                    wire:click="save">
                                    ตกลง
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center bg-maroon">ส่วนลด</td>
                            <td colspan="2" style="padding: 0;background: gray;">
                                <h1 class="text-right" style="margin: 0;color: yellow;">
                                    {{ $discountText }}
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center bg-maroon">เงินทอน</td>
                            <td colspan="2" style="padding: 0;background: gray;">
                                <h1 class="text-right" style="margin: 0;color: yellow;">
                                    {{ $changeText }}
                                </h1>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
            <div wire:loading wire:target="save"  wire:loading.class="overlay" wire:loading.flex>
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
