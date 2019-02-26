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
            d.pcode=321 and
            a.qid!=1
        group by
            a.answer