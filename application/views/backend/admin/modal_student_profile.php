
<?php
$student_info   =   $this->db->get_where('enroll' , array('student_id' => $param2 , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description))->result_array();
foreach($student_info as $row):?>

<div class="col-md-12 ">
  <div class="panel-body">
    <div class="col-md-6 ">
      <div class="thumb-info mb-md">
          <img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="rounded img-responsive">
          <div class="thumb-info-title">
              <span class="thumb-info-inner"><?php echo $this->db->get_where('student' , array('student_id' => $param2))->row()->name;?></span>
              <span class="thumb-info-type">STUDENT</span>
          </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="widget-toggle-expand mb-md">
          <div class="widget-header">
              <h6><?php echo get_phrase('profile');?></h6>
              <hr class="dotted short">
          </div>
                    <table class="table table-striped table-bordered  mb-none">
                
                    <?php if($row['class_id'] != ''):?>
                    <tr>
                        <td><?php echo get_phrase('class');?></td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['section_id'] != '' && $row['section_id'] != 0):?>
                    <tr>
                        <td><?php echo get_phrase('section');?></td>
                        <td><b><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['roll'] != ''):?>
                    <tr>
                        <td><?php echo get_phrase('roll');?></td>
                        <td><b><?php echo $row['roll'];?></b></td>
                    </tr>
                    <?php endif;?>
                    <tr>
                        <td><?php echo get_phrase('birthday');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('gender');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->sex;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('religion');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->religion;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('blood_group');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->blood_group;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('phone');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('email');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email;?></b></td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('address');?></td>
                        <td><b><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address;?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('parent');?></td>
                        <td>
                            <b>
                     <?php 
                          $parent_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->parent_id;
                          echo $this->db->get_where('parent' , array('parent_id' => $parent_id))->row()->name;
                      ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo get_phrase('parent_phone');?></td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $parent_id))->row()->phone;?></b></td>
                    </tr> 
                </table>
      </div>
     </div>
  </div>
</div>
<?php endforeach;?>
<br/>