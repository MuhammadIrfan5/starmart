<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.ViewOrder')); ?> <small> <?php echo e(trans('labels.ViewOrder')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li><a href="<?php echo e(URL::to('admin/orders/display')); ?>"><i class="fa fa-dashboard"></i>  <?php echo e(trans('labels.ListingAllOrders')); ?></a></li>
      <li class="active"> <?php echo e(trans('labels.ViewOrder')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="invoice" style="margin: 15px;">
      <!-- title row -->
      <?php if(session()->has('message')): ?>
       <div class="col-xs-12">
       <div class="row">
      	<div class="alert alert-success alert-dismissible">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           <h4><i class="icon fa fa-check"></i> <?php echo e(trans('labels.Successlabel')); ?></h4>
            <?php echo e(session()->get('message')); ?>

        </div>
        </div>
        </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        <div class="col-xs-12">
      	<div class="row">
        	<div class="alert alert-warning alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('labels.WarningLabel')); ?></h4>
                <?php echo e(session()->get('error')); ?>

            </div>
          </div>
         </div>
        <?php endif; ?>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
            <i class="fa fa-globe"></i> <?php echo e(trans('labels.OrderID')); ?># <?php echo e($data['orders_data'][0]->orders_id); ?>  
            
            <small style="display: inline-block" class="label label-primary">
            <?php if($data['orders_data'][0]->ordered_source == 1): ?>
            <?php echo e(trans('labels.Website')); ?>

            <?php else: ?>
            <?php echo e(trans('labels.Application')); ?>

            <?php endif; ?>
            </small>
            <small style="display: inline-block"><?php echo e(trans('labels.OrderedDate')); ?>: <?php echo e(date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased))); ?></small>
            <a href="<?php echo e(URL::to('admin/orders/invoiceprint/'.$data['orders_data'][0]->orders_id)); ?>" target="_blank"  class="btn btn-default pull-right"><i class="fa fa-print"></i> <?php echo e(trans('labels.Print')); ?></a>
            <?php if($result['commonContent']['setting']['is_enable_location']==1 and $data['orders_data'][0]->orders_status_id == 7 ): ?>
              <?php if($data['current_boy']): ?>
              <button type="button" data-toggle="modal" data-target="#trackmodal" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-location-arrow"></i> <?php echo e(trans('labels.Track Order')); ?></button>
              

              <!-- Modal -->
              <div id="trackmodal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-body" id="googleMap" style="height: 400px">
                    </div>
                  </div>

                </div>
              </div>
              
              <?php endif; ?>
            <?php endif; ?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <?php echo e(trans('labels.CustomerInfo')); ?>:
          <address>
            <strong><?php echo e($data['orders_data'][0]->customers_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->customers_street_address); ?> <br>
            <?php echo e($data['orders_data'][0]->customers_city); ?>, <?php echo e($data['orders_data'][0]->customers_state); ?> <?php echo e($data['orders_data'][0]->customers_postcode); ?>, <?php echo e($data['orders_data'][0]->customers_country); ?><br>
            <?php echo e(trans('labels.Phone')); ?>: <?php echo e($data['orders_data'][0]->customers_telephone); ?><br>
            <?php echo e(trans('labels.Email')); ?>: <?php echo e($data['orders_data'][0]->email); ?>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <?php echo e(trans('labels.ShippingInfo')); ?>

          <address>
            <strong><?php echo e($data['orders_data'][0]->delivery_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->delivery_street_address); ?> <br>
            <?php echo e($data['orders_data'][0]->delivery_city); ?>, <?php echo e($data['orders_data'][0]->delivery_state); ?> <?php echo e($data['orders_data'][0]->delivery_postcode); ?>, <?php echo e($data['orders_data'][0]->delivery_country); ?><br>

            <strong><?php echo e(trans('labels.Phone')); ?>: </strong><?php echo e($data['orders_data'][0]->delivery_phone); ?><br>
           <strong> <?php echo e(trans('labels.ShippingMethod')); ?>:</strong> <?php echo e($data['orders_data'][0]->shipping_method); ?> <br>
           <strong> <?php echo e(trans('labels.ShippingCost')); ?>:</strong> 
           <?php if(!empty($data['orders_data'][0]->shipping_cost)): ?> 
           <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
            <?php else: ?> --- <?php endif; ?> <br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         <?php echo e(trans('labels.BillingInfo')); ?>

          <address>
            <strong><?php echo e($data['orders_data'][0]->billing_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->billing_street_address); ?> <br>
            <strong><?php echo e(trans('labels.Phone')); ?>: </strong><?php echo e($data['orders_data'][0]->billing_phone); ?><br>
            <?php echo e($data['orders_data'][0]->billing_city); ?>, <?php echo e($data['orders_data'][0]->billing_state); ?> <?php echo e($data['orders_data'][0]->billing_postcode); ?>, <?php echo e($data['orders_data'][0]->billing_country); ?><br>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th><?php echo e(trans('labels.Qty')); ?></th>
              <th><?php echo e(trans('labels.Image')); ?></th>
              <th><?php echo e(trans('labels.ProductName')); ?></th>
              <th><?php echo e(trans('labels.ProductModal')); ?></th>
              <th><?php echo e(trans('labels.Options')); ?></th>
              <th><?php echo e(trans('labels.Price')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $data['orders_data'][0]->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($products->products_quantity); ?></td>
                <td >
                   <img src="<?php echo e(asset('').$products->image); ?>" width="60px"> <br>
                </td>
                <td  width="30%">
                    <?php echo e($products->products_name); ?><br>
                </td>
                <td>
                    <?php echo e($products->products_model); ?>

                </td>
                <td>
                <?php $__currentLoopData = $products->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<b><?php echo e(trans('labels.Name')); ?>:</b> <?php echo e($attributes->products_options); ?><br>
                    <b><?php echo e(trans('labels.Value')); ?>:</b> <?php echo e($attributes->products_options_values); ?><br>
                    <b><?php echo e(trans('labels.Price')); ?>:</b> 
                    <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($attributes->options_values_price * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($attributes->options_values_price * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br />

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>

                <td>
                  
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($products->final_price  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($products->final_price  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
                  </td>
             </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">
          <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.PaymentMethods')); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize">
           	<?php echo e(str_replace('_',' ', $data['orders_data'][0]->payment_method)); ?>

          </p>
          <?php if(!empty($data['orders_data'][0]->coupon_code)): ?>
              <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.Coupons')); ?>:</p>
                <table class="text-muted well well-sm no-shadow stripe-border table table-striped" style="text-align: center; ">
                	<tr>
                        <th style="text-align: center; "><?php echo e(trans('labels.Code')); ?></th>
                        <th style="text-align: center; "><?php echo e(trans('labels.Amount')); ?></th>
                    </tr>
                	<?php $__currentLoopData = json_decode($data['orders_data'][0]->coupon_code); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $couponData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
                        	<td><?php echo e($couponData->code); ?></td>
                            <td><?php echo e($couponData->amount); ?>


                                <?php if($couponData->discount_type=='percent_product'): ?>
                                    (<?php echo e(trans('labels.Percent')); ?>)
                                <?php elseif($couponData->discount_type=='percent'): ?>
                                    (<?php echo e(trans('labels.Percent')); ?>)
                                <?php elseif($couponData->discount_type=='fixed_cart'): ?>
                                    (<?php echo e(trans('labels.Fixed')); ?>)
                                <?php elseif($couponData->discount_type=='fixed_product'): ?>
                                    (<?php echo e(trans('labels.Fixed')); ?>)
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
               <!-- <?php echo e($data['orders_data'][0]->coupon_code); ?>-->

          <?php endif; ?>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">-->

		  <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.Orderinformation')); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize; word-break:break-all;">
           <?php if(trim($data['orders_data'][0]->order_information) != '[]' or !empty($data['orders_data'][0]->order_information)): ?>
           		<?php echo e($data['orders_data'][0]->order_information); ?>

           <?php endif; ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">
              <tr>
                <th style="width:50%"><?php echo e(trans('labels.Subtotal')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['subtotal']  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['subtotal']  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
              <tr>
                <th><?php echo e(trans('labels.Tax')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->total_tax   * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->total_tax   * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
              <tr>
                <th><?php echo e(trans('labels.ShippingCost')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
                  </td>
              </tr>
              <?php if(!empty($data['orders_data'][0]->coupon_code)): ?>
              <tr>
                <th><?php echo e(trans('labels.DicountCoupon')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->coupon_amount  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->coupon_amount  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>                  
              </tr>
              <?php endif; ?>
              <tr>
                <th><?php echo e(trans('labels.Total')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->order_price  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->order_price  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
            </table>
          </div>

        </div>
     
    <?php echo Form::open(array('url' =>'admin/orders/updateOrder', 'method'=>'post', 'onSubmit'=>'return cancelOrder();', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

     <?php echo Form::hidden('orders_id', $data['orders_data'][0]->orders_id, array('class'=>'form-control', 'id'=>'orders_id')); ?>

     <?php echo Form::hidden('old_orders_status', $data['orders_data'][0]->orders_status_id, array('class'=>'form-control', 'id'=>'old_orders_status')); ?>

     <?php echo Form::hidden('order_total', $data['orders_data'][0]->order_price, array('class'=>'form-control', 'id'=>'order_total')); ?>

     <?php echo Form::hidden('customers_id', $data['orders_data'][0]->customers_id, array('class'=>'form-control', 'id'=>'device_id')); ?>

        <div class="col-xs-6">
        <hr>
          <p class="lead"><?php echo e(trans('labels.ChangeStatus')); ?>:</p>

            <div class="col-md-12">
              <div class="form-group">
                <label><?php echo e(trans('labels.PaymentStatus')); ?>:</label>
                <select class="form-control select2" id="status_id" name="orders_status" style="width: 100%;">
                  <?php $__currentLoopData = $data['orders_status']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($orders_status->orders_status_id); ?>"
                    <?php if( $data['orders_data'][0]->orders_status_id == $orders_status->orders_status_id): ?> selected="selected" <?php endif; ?>>
                    <?php echo e($orders_status->orders_status_name); ?>

                  </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </select>
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.ChooseStatus')); ?></span>
              </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                <label><?php echo e(trans('labels.Comments')); ?>:</label>
                <?php echo Form::textarea('comments',  '', array('class'=>'form-control', 'id'=>'comments', 'rows'=>'4')); ?>

                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.CommentsOrderText')); ?></span>
              </div>
            </div>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> <?php echo e(trans('labels.Submit')); ?> </button>
             

        </div>
         <!-- this row will not appear when printing -->
            
          <?php echo Form::close(); ?>



          <?php echo Form::close(); ?>

                
                <?php echo Form::open(array('url' =>'admin/orders/assignorders', 'method'=>'post', 'class' =>
                'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                <?php echo Form::hidden('orders_id', $data['orders_data'][0]->orders_id, array('class'=>'form-control',
                'id'=>'orders_ids')); ?>


                <?php if($data['current_boy']): ?>
                <?php echo Form::hidden('old_deliveryboy_id', $data['current_boy']->deliveryboy_id,
                array('class'=>'form-control', 'id'=>'deliveryboy_id')); ?>

                <?php echo Form::hidden('is_new', 'false', array('id'=>'is_new')); ?>

                <?php echo Form::hidden('orders_to_deliveryboy_id', $data['current_boy']->orders_to_deliveryboy_id,
                array('id'=>'orders_to_deliveryboy_id')); ?>

                <?php else: ?>
                <?php echo Form::hidden('is_new', 'true', array('id'=>'is_new')); ?>

                <?php endif; ?>

                <div class="col-xs-6">
                    <hr>
                    <?php if( $data['orders_data'][0]->orders_status_id == 2 or $data['orders_data'][0]->orders_status_id ==
                    6): ?>
                    <p class="lead"><?php echo e(trans('labels.Delivery By')); ?>:
                        <strong>
                            <?php $__currentLoopData = $data['delivery_boys']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery_boy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($data['current_boy'])): ?>
                            <?php if($data['current_boy']->deliveryboy_id == $delivery_boy->id): ?>
                            <?php echo e($delivery_boy->first_name); ?> <?php echo e($delivery_boy->last_name); ?>

                            (<?php echo e($delivery_boy->deliveryboy_status); ?>)
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </stroing>
                    </p>
                    <?php else: ?>
                    
                    <?php if($result['commonContent']['setting']['is_deliverboy_purchased'] == '1'): ?>
                    <p class="lead"><?php echo e(trans('labels.Assign Order to Delivery Boy')); ?>:</p>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label><?php echo e(trans('labels.Choose Delivery Boy')); ?>:</label>
                            <select class="form-control" id="is_new_boy" required name="deliveryboy_id">
                                <option value=""><?php echo e(trans('labels.Choose Delivery Boy')); ?></option>
                                <?php $__currentLoopData = $data['delivery_boys']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery_boy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($delivery_boy->id); ?>" <?php if(!empty($data['current_boy'])): ?> <?php if(
                                    $data['current_boy']->deliveryboy_id == $delivery_boy->id): ?> selected="selected"
                                    <?php endif; ?> <?php endif; ?>>
                                    <?php echo e($delivery_boy->first_name); ?> <?php echo e($delivery_boy->last_name); ?>

                                    (<?php echo e($delivery_boy->deliveryboy_status); ?>)
                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="help-block"
                                style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.Choose Delivery Boy')); ?></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                      <?php echo e(trans('labels.Submit')); ?> </button>
                    <?php endif; ?>  
                    <?php endif; ?>


                </div>
                <!-- this row will not appear when printing -->
                
                <?php echo Form::close(); ?>


        <div class="col-xs-12">
          <p class="lead"><?php echo e(trans('labels.OrderHistory')); ?></p>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo e(trans('labels.Date')); ?></th>
                  <th><?php echo e(trans('labels.Status')); ?></th>
                  <th><?php echo e(trans('labels.Comments')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data['orders_status_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_status_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
							<?php
								$date = new DateTime($orders_status_history->date_added);
								$status_date = $date->format('d-m-Y');
								print $status_date;
							?>
                        </td>
                        <td>
                        	<?php if($orders_status_history->orders_status_id==1): ?>
                            	<span class="label label-warning">
                            <?php elseif($orders_status_history->orders_status_id==2): ?>
                                <span class="label label-success">
                            <?php elseif($orders_status_history->orders_status_id==3): ?>
                                 <span class="label label-danger">
                            <?php else: ?>
                                 <span class="label label-primary">
                            <?php endif; ?>
                            <?php echo e($orders_status_history->orders_status_name); ?>

                                 </span>
                        </td>
                        <td style="text-transform: initial;"><?php echo e($orders_status_history->comments); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
  <!-- /.content -->
</div>
<?php if($result['commonContent']['setting']['is_enable_location']==1 and $result['commonContent']['setting']['google_map_api'] != ''): ?>
<script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-database.js"></script>
    <script>
/**
 * Firebase config block.
 */
var config = {
    apiKey: "<?php echo e($result['commonContent']['setting']['google_map_api']); ?>",
    authDomain: "<?php echo e($result['commonContent']['setting']['auth_domain']); ?>",
    databaseURL: "<?php echo e($result['commonContent']['setting']['database_URL']); ?>",
    projectId: "<?php echo e($result['commonContent']['setting']['projectId']); ?>",
    storageBucket: "<?php echo e($result['commonContent']['setting']['storage_bucket']); ?>",
    messagingSenderId: "<?php echo e($result['commonContent']['setting']['messaging_senderid']); ?>",
    appId: "<?php echo e($result['commonContent']['setting']['firebase_appid']); ?>"
};
  
  firebase.initializeApp(config);

/**
 * Data object to be written to Firebase.
 */
var data = {sender: 456456, timestamp: null, lat: null, lng: null};

function makeInfoBox(controlDiv, map) {
  // Set CSS for the control border.
  var controlUI = document.createElement('div');
  controlUI.style.boxShadow = 'rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px';
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '2px';
  controlUI.style.marginBottom = '22px';
  controlUI.style.marginTop = '10px';
  controlUI.style.textAlign = 'center';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior.
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontSize = '100%';
  controlText.style.padding = '6px';
  controlText.textContent =
      'The map shows all clicks made in the last 10 minutes.';
  controlUI.appendChild(controlText);
}

      /**
      * Starting point for running the program. Authenticates the user.
      * @param  {function()} onAuthSuccess - Called when authentication succeeds.
      */
      function initAuthentication(onAuthSuccess) {
        firebase.auth().signInAnonymously().catch(function(error) {
          console.log(error.code + ', ' + error.message);
        }, {remember: 'sessionOnly'});

        firebase.auth().onAuthStateChanged(function(user) {
          if (user) {
            data.sender = user.uid;
            onAuthSuccess();
          } else {
            // User is signed out.
          }
        });
      }

      /**
       * Creates a map object with a click listener and a heatmap.
       */
      function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          center: {lat: 0, lng: 0},
          zoom: 3,
          styles: [{
            featureType: 'poi',
            stylers: [{ visibility: 'off' }]  // Turn off POI.
          },
          {
            featureType: 'transit.station',
            stylers: [{ visibility: 'off' }]  // Turn off bus, train stations etc.
          }],
          disableDoubleClickZoom: true,
          streetViewControl: false,
        });

        // Create the DIV to hold the control and call the makeInfoBox() constructor
        // passing in this DIV.
        var infoBoxDiv = document.createElement('div');
        makeInfoBox(infoBoxDiv, map);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(infoBoxDiv);

        // Listen for clicks and add the location of the click to firebase.
        map.addListener('click', function(e) {
          data.lat = e.latLng.lat();
          data.lng = e.latLng.lng();
          addToFirebase(data);
        });

        // Create a heatmap.
        var heatmap = new google.maps.visualization.HeatmapLayer({
          data: [],
          map: map,
          radius: 16
        });

        initAuthentication(initFirebase.bind(undefined, heatmap));
      }

      /**
       * Set up a Firebase with deletion on clicks older than expiryMs
       * @param  {!google.maps.visualization.HeatmapLayer} heatmap The heatmap to
       */
      function initFirebase(heatmap) {

        // 10 minutes before current time.
        var startTime = new Date().getTime() - (60 * 10 * 1000);

        // Reference to the clicks in Firebase.
        var clicks = firebase.database().ref('clicks');

        // Listen for clicks and add them to the heatmap.
        clicks.orderByChild('timestamp').startAt(startTime).on('child_added',
          function(snapshot) {
            // Get that click from firebase.
            var newPosition = snapshot.val();
            var point = new google.maps.LatLng(newPosition.lat, newPosition.lng);
            var elapsedMs = Date.now() - newPosition.timestamp;

            // Add the point to the heatmap.
            heatmap.getData().push(point);

            // Request entries older than expiry time (10 minutes).
            var expiryMs = Math.max(60 * 10 * 1000 - elapsedMs, 0);

            // Set client timeout to remove the point after a certain time.
            window.setTimeout(function() {
              // Delete the old point from the database.
              snapshot.ref.remove();
            }, expiryMs);
          }
        );

        // Remove old data from the heatmap when a point is removed from firebase.
        clicks.on('child_removed', function(snapshot, prevChildKey) {
          var heatmapData = heatmap.getData();
          var i = 0;
          while (snapshot.val().lat != heatmapData.getAt(i).lat()
            || snapshot.val().lng != heatmapData.getAt(i).lng()) {
            i++;
          }
          heatmapData.removeAt(i);
        });
      }

      /**
       * Updates the last_message/ path with the current timestamp.
       * @param  {function(Date)} addClick After the last message timestamp has been updated,
       *     this function is called with the current timestamp to add the
       *     click to the firebase.
       */
      function getTimestamp(addClick) {
        // Reference to location for saving the last click time.
        var ref = firebase.database().ref('last_message/' + data.sender);

        ref.onDisconnect().remove();  // Delete reference from firebase on disconnect.

        // Set value to timestamp.
        ref.set(firebase.database.ServerValue.TIMESTAMP, function(err) {
          if (err) {  // Write to last message was unsuccessful.
            console.log(err);
          } else {  // Write to last message was successful.
            ref.once('value', function(snap) {
              addClick(snap.val());  // Add click with same timestamp.
            }, function(err) {
              console.warn(err);
            });
          }
        });
      }

      /**
       * Adds a click to firebase.
       * @param  {Object} data The data to be added to firebase.
       *     It contains the lat, lng, sender and timestamp.
       */
      function addToFirebase(data) {
        getTimestamp(function(timestamp) {
          // Add the new timestamp to the record data.
          data.timestamp = timestamp;
          var ref = firebase.database().ref('clicks').push(data, function(err) {
            if (err) {  // Data was not written to firebase.
              console.warn(err);
            }
          });
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?=$result['commonContent']['setting']['google_map_api']?>&libraries=visualization&callback=initMap">
    </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\customecommercea\resources\views/admin/Orders/vieworder.blade.php ENDPATH**/ ?>