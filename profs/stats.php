<?php
    require "../headers/home_header.php";
    require "../db.php";

    $id = $_GET[ "id" ];    

    $query = "
        select
            count( a.eid ) as count,
            a.answer
        from
            answers a join
            enrolled b join
            subject_assignations c join
            persons d
        on
            a.eid=b.eid and
            b.said=c.said and
            c.profid=d.pid and
            d.pcode=$id and
            a.qid!=1
        group by
            a.answer
    ";

    $cquery = "
        select a.answer
        from 
            answers a join
            enrolled b join
            subject_assignations c join
            persons d
        on
            a.eid=b.eid and
            b.said=c.said and
            c.profid=d.pid and
            d.pcode=$id and
            a.qid=1            
    ";

    $comments = $con->query( $cquery );

    $prof = "No results";
    if( $id = (int)$id ) {
        if( is_integer( $id ) ) {
            $prof = $con->query( "select * from persons where pcode=$id and ptype=1" )->fetch_assoc();
            $prof = !$prof? "No results": $prof[ "plname" ]. ", " .$prof[ "pfname" ]. " " .$prof[ "pmname" ];
            $data = $con->query( $query );
            $arr = [];
            foreach( $data as $x ) {
                $arr[ $x[ "answer" ] ] = $x[ "count"];
            }
        }
    }
?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h1>FCPC Evaluation System</h1>
                    <h4>Statistics of: <?= $prof ?></h4>
                    <table>
                        <thead>
                            <th>Score</th>
                            <th>Count</th>
                        </thead>
                        <tbody>
                    <?php for( $x = 0; $x < 5; $x ++ ) { ?>
                        <tr>
                            <td><?= $x + 1 ?></td>
                            <td><?= !$arr[ $x + 1 ]? 0: $arr[ $x + 1 ] ?></td>
                        <tr>
                    <?php } ?>
                        </tbody>
                    </table>
                    <b>Comments: </b><br>
                    <?php foreach( $comments as $x ) { ?>
                        <b><?= $x[ "answer" ] ?></b><br>
                    <?php } ?>
                    <p><small></small></p>
                </div>                
            </div>
        </section>
    </main>
<?php require "../footers/footer.php" ?>
