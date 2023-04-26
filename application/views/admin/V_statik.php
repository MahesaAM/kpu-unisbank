<style>
    @import "compass/css3";

    ul {
        padding: 50px 0 0 0;
        list-style: none;
    }

    ul span {
        display: inline-block;
        width: 16px;
        height: 16px;
        padding-right: 5px;
    }

    ul li {
        font-family: "Lucida Grande", sans-serif;
        margin: 0 0 0.5rem 0;
    }

    ul li span.vote-percentage {
        margin-right: 16px;
    }

    canvas {
        float: left;
        margin: 0 50px 0 0;
    }
</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h3>Statik</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <a class="btn btn-primary pull-right" href="<?= base_url('administrator/Pemilihan/pemilih/' . $tahun) ?>">Lihat Pemilih</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">

                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div id="hasil"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://s.cdpn.io/3/Chart.min.js"></script>
    <script>
        var old_count = 0;

        setInterval(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('administrator/Pemilihan/check_hasil') ?>",
                data: {
                    tahun: '<?= $tahun ?>'
                },
                success: function(data) {
                    if (data > old_count) {
                        hasil();
                        old_count = data;
                    }
                }
            });
        }, 1000);

        function hasil() {
            $.ajax({
                url: '<?= base_url('administrator/Pemilihan/hasil') ?>',
                type: 'post',
                data: {
                    tahun: '<?= $tahun ?>'
                },
                success: function(data) {
                    $('#hasil').html(data);
                    <?php foreach ($unv as $u) : ?>
                        var pieChartData = [],
                            totalVotes = 0,
                            $dataItems = $("ul.jabatan<?= $u['jabatan_id'] . 'm' ?> li.calon<?= $u['jabatan_id'] . 'm' ?>");

                        // grab total votes
                        $dataItems.each(function(index, item) {
                            totalVotes += parseInt($(item).data('votes'));
                        });

                        // iterate through items to draw pie chart
                        // and populate % in dom
                        $dataItems.each(function(index, item) {
                            var votes = parseInt($(item).data('votes')),
                                votePercentage = votes / totalVotes * 100,
                                roundedPrecentage = Math.round(votePercentage * 10) / 10;

                            $(this).find(".vote-percentage<?= $u['jabatan_id'] . 'm' ?>").text(roundedPrecentage);

                            pieChartData.push({
                                value: roundedPrecentage,
                                color: $(item).data('color')
                            });
                        });

                        var ctx = $(document).find("#pieChart<?= $u['jabatan_id'] . 'm' ?>").get(0).getContext("2d");
                        var myNewChart = new Chart(ctx).Pie(pieChartData, {});
                    <?php endforeach; ?>
                    <?php foreach ($fak as $f) : ?>
                        var pieChartData = [],
                            totalVotes = 0,
                            $dataItems = $("ul.jabatan<?= $f['jabatan_id'] . 'm' ?> li.calon<?= $f['jabatan_id'] . 'm' ?>");

                        // grab total votes
                        $dataItems.each(function(index, item) {
                            totalVotes += parseInt($(item).data('votes'));
                        });

                        // iterate through items to draw pie chart
                        // and populate % in dom
                        $dataItems.each(function(index, item) {
                            var votes = parseInt($(item).data('votes')),
                                votePercentage = votes / totalVotes * 100,
                                roundedPrecentage = Math.round(votePercentage * 10) / 10;

                            $(this).find(".vote-percentage<?= $f['jabatan_id'] . 'm' ?>").text(roundedPrecentage);

                            pieChartData.push({
                                value: roundedPrecentage,
                                color: $(item).data('color')
                            });
                        });

                        var ctx = $(document).find("#pieChart<?= $f['jabatan_id'] . 'm' ?>").get(0).getContext("2d");
                        var myNewChart = new Chart(ctx).Pie(pieChartData, {});
                    <?php endforeach; ?>
                    <?php foreach ($hmps as $h) : ?>
                        var pieChartData = [],
                            totalVotes = 0,
                            $dataItems = $("ul.jabatan<?= $h['sub_id'] . 's' ?> li.calon<?= $h['sub_id'] . 's' ?>");

                        // grab total votes
                        $dataItems.each(function(index, item) {
                            totalVotes += parseInt($(item).data('votes'));
                        });

                        // iterate through items to draw pie chart
                        // and populate % in dom
                        $dataItems.each(function(index, item) {
                            var votes = parseInt($(item).data('votes')),
                                votePercentage = votes / totalVotes * 100,
                                roundedPrecentage = Math.round(votePercentage * 10) / 10;

                            $(this).find(".vote-percentage<?= $h['sub_id'] . 's' ?>").text(roundedPrecentage);

                            pieChartData.push({
                                value: roundedPrecentage,
                                color: $(item).data('color')
                            });
                        });

                        var ctx = $(document).find("#pieChart<?= $h['sub_id'] . 's' ?>").get(0).getContext("2d");
                        var myNewChart = new Chart(ctx).Pie(pieChartData, {});
                    <?php endforeach; ?>
                }
            });
        }
    </script>