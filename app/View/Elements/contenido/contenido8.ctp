<table class="table table-striped">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Detalle</th>
                  <th>Quitar</th>
                </tr>
              </thead>
              <tbody>
              <?php  foreach ($items as $value) { ?>
                <tr>
                  <td><?php echo $value['img'] ?> // <?php echo $value['name'] ?></td>
                
                  <td><?php echo $value['cantidad'] ?></td>
                  <td><?php echo $value['detalle'] ?></td>
                  <td><?php echo $this->Html->link(__('quitar'), array('controller' => 'ItemsQuotes', 'action' => 'select1',$value['id'])); ?></td>
                </tr>
               <?php } ?>
              </tbody>
</table>