
<font color="black">
      <div style="height: 18mm; width: 225mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif;">
      <div style="height: 15mm; width: 23mm; float: left;"><img src="mdpufimages/MDPUFReport.jpg" alt="MdpufRpt" width="80" height="60" border="0"> </div>
      <div style="height: 5mm; width: 150mm; float: left;"></div>
      <div style="height: 5mm; width: 90mm; float: left; font-weight: bold; font-size: 12pt;">PT. XYZ  </div>
      <div style="height: 5mm; width: 60mm; float: left; font-weight: bold; font-size: 8pt;">Dicetak Oleh : RONALD</div>
      <div style="height: 5mm; width: 90mm; float: left;"> </div>
      <div style="height: 5mm; width: 60mm; float: left; font-weight: bold; font-size: 8pt;">Tgl/Jam Cetak: 11-Feb-19 14:21:11</div> </div>
      
  </font>
<div style="height: 5mm; width: 225mm; border-top: 0pt none; float: left; font-weight: bold; font-size: 12pt;"><font color="black">Laporan Pemasukan Bank </font></div>
      
      <font color="black"><div style="height: 4.5mm; width: 250mm; border-top: 1px solid rgb(0, 0, 0); border-bottom: 1px solid rgb(0, 0, 0); font-weight: bold; font-size: 8pt; float: left;">
      <div style="height: 4.5mm; width: 7mm; float: left;"> </div>
      <div style="height: 4.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Tanggal </div>
      <div style="height: 4.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Rekening </div>
      <div style="height: 4.5mm; width: 50mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Keterangan </div>
      <div style="height: 4.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Debet </div>
      <div style="height: 4.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Kredit </div>
      <div style="height: 4.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">&nbsp;Saldo </div>
      </div>


  <?php foreach ($rekening as $variant) { 

       $tanggal = $variant->tglmasuk;
       $rek = $variant->rek;
       $keterangan = $variant->keterangan;
       $debet = $variant->debet;
       $credit = $variant->credit;
       $saldo = $variant->saldo;
    ?>

  <div style="height: 5.5mm; width:320mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 8pt; font-weight: normal;">     
   <div style="height: 5.5mm; width:320mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 8pt; font-weight: normal;">
      <div style="height: 5.5mm; width: 5mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 8pt; font-weight: normal; text-align: right;"><?php echo $tanggal; ?></div>
      <div style="height: 5.5mm; width: 2mm; float: left;"> </div>
      <div style="height: 5.5mm; width: 35mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 8pt; font-weight: normal; text-align: left;">&nbsp;<?php echo $rek; ?></div>
      <div style="height: 5.5mm; width: 50mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 8pt; font-weight: normal; text-align: left;">&nbsp;<?php echo $keterangan; ?></div>
      <div style="height: 5.5mm; width: 30mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: normal; text-align: center;"><?php echo $debet; ?></div>
      <div style="height: 5.5mm; width: 30mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: normal; text-align: center;"><?php echo $credit; ?></div>
      <div style="height: 5.5mm; width: 30mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: normal; text-align: center;"><?php echo $saldo; ?></div>  
      
    <?php } ?>    
 
      
      <div style="height: 4.5mm; width: 250mm; border-top: 1px solid rgb(0, 0, 0); float: left;">
      <div style="height: 4.5mm; width: 38mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold;">TOTAL KANDIDAT</div>
      <div style="height: 4.5mm; width: 80mm; border: 0pt none; float: left; letter-spacing: 0.1em; font-family: Serif; font-size: 7pt; font-weight: bold; text-align: left;">( 23 Kandidat )&nbsp;<input type="text" id="ccc" name="ccc" value="23" style="visibility:hidden" height="0"></div>
      
      <div style="height: 4.5mm; width: 20mm; border: 0pt none; float: left;"></div>
      <div style="height: 4.5mm; width: 0mm; border: 0pt none; float: left;"> </div>
      <div style="height: 4.5mm; width: 0mm; border: 0pt none; float: left;"></div>
      <div style="height: 4.5mm; width: 0mm; border: 0pt none; float: left;"> </div>
      <div style="height: 4.5mm; width: 0mm; border: 0pt none; float: left;"> </div>
      <div style="height: 4.5mm; width: 0mm; border: 0pt none; float: left;"> </div>
      </div>
      
      
      
  <div id="txtHint8" style="height: 4.5mm; width: 250mm; border-top: 1px solid rgb(0, 0, 0); float: left;"></div>  

    <div style="height: 0px; width: 0px;">
</div>




     </a></div><a> 


</a></div><a>    

    </a></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></font>