select
            h.pfname as proffname,
            h.pmname as profmname,
            h.plname as proflname,
            g.*
        from
            (
                select
                    a.eid, b.said, b.profid, c.*,
                    d.yasyear, d.yassection, e.*, f.*
                from
                    enrolled a join
                    subject_assignations b join
                    subjects c join
                    year_and_secs d join
                    courses e join
                    persons f
                on
                    a.said=b.said and
                    b.sjid=c.sjid and
                    b.yasid=d.yasid and
                    d.cid=e.cid and
                    a.studid=f.pid
            ) g join persons h
        on
            g.profid=h.pid

